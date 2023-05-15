<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM ufo_related_articles
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'UFO Related Article has been deleted' );
  
  header( 'Location: articles.php' );
  die();
  
} 

include( 'includes/header.php' );

$query = 'SELECT *
  FROM ufo_related_articles
  ORDER BY title';
  
$result = mysqli_query( $connect, $query );

// $query = 'SELECT title, location, details, date, photo, photo_credit, encounter_description 
//     FROM ufo_sightings 
//     JOIN encounter_type ON ufo_sightings.encounter_id = encounter_type.id 
//     ORDER BY date DESC';
// $result = mysqli_query( $connect, $query );

?>
<h2>Manage UFO Related Articles</h2>

<div class="grid-container-2">
  <div class="grid-title-2 grid-border-2">ID</div>
    <div class="grid-title-2 grid-border-2">Title</div>
    <div class="grid-title-2 grid-border-2">Link</div>
    <div class="grid-title-2 grid-border-2"></div>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <div class="grid-border-2">
      <div class="grid-title-small-2">ID</div>
      <div class="grid-id-2"><?php echo $record['id']; ?></div>
    </div>
    <div class="grid-border-2">
      <div class="grid-title-small-2">Title</div>
      <div class="grid-id-2"><?php echo htmlentities( $record['title'] ); ?></div>
    </div>
    <div class="grid-border-2 grid-link">
      <div class="grid-title-small-2">Link</div>
      <div class="grid-description-bottom"><?php echo htmlentities( $record['link'] ); ?></div>
    </div>
    <div class="grid-icon-2 grid-border-2">
      <a href="articles_edit.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-pen-to-square ficon2"></i></a><br><br>
      <a href="articles.php?delete=<?php echo $record['id']; ?>" onclick="javascript:if(confirm('Are you sure you want to delete this article?')==true){return true;} else {return false;};"><i class="fa-solid fa-trash ficon2"></i></a>
    </div>
  <?php endwhile; ?>
</div>

<p><a href="articles_add.php"><i class="fas fa-plus-square"></i> Add UFO Related Article</a></p>

<script src="https://kit.fontawesome.com/c54b7d85ab.js" crossorigin="anonymous"></script>
<?php

include( 'includes/footer.php' );

?>