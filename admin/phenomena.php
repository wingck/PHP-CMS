<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM ufo_natural_phenomena
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'UFO Natural phenomena has been deleted' );
  
  header( 'Location: phenomena.php' );
  die();
  
} 

include( 'includes/header.php' );

$query = 'SELECT *
  FROM ufo_natural_phenomena
  ORDER BY title';
  
$result = mysqli_query( $connect, $query );

// $query = 'SELECT title, location, details, date, photo, photo_credit, encounter_description 
//     FROM ufo_sightings 
//     JOIN encounter_type ON ufo_sightings.encounter_id = encounter_type.id 
//     ORDER BY date DESC';
// $result = mysqli_query( $connect, $query );

?>
<h2>Manage UFO Natural Phenomena</h2>

<div class="grid-container-3">
  <div class="grid-title-3 grid-border-3">Photo</div>
  <div class="grid-title-3 grid-border-3">ID</div>
  <div class="grid-title-3 grid-border-3">Title</div>
  <div class="grid-title-3 grid-border-3">Description</div>
  <div class="grid-title-3 grid-border-3">More Details</div>
  <div class="grid-title-3 grid-border-3"></div>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
  <div class="grid-border-3">
    <div class="grid-title-small-3">Photo</div>
    <div><img src="image.php?type=phenomena&id=<?php echo $record['id']; ?>&width=267&height=200&format=inside"></div>
  </div>
  <div class="grid-border-3">
    <div class="grid-title-small-3">ID</div>
    <div class="grid-id-3"><?php echo $record['id']; ?></div>
  </div>
  <div class="grid-border-3">
    <div class="grid-title-small-3">Title</div>
    <div><?php echo htmlentities( $record['title'] ); ?></div>
  </div>
  <div class="grid-border-3">
    <div class="grid-title-small-3">Description</div>
    <div class="grid-description"><?php echo $record['description']; ?></div>
  </div>
  <div class="grid-border-3">
    <div class="grid-title-small-3">More Details</div>
    <div class="grid-details"><?php echo htmlentities( $record['details_link'] ); ?></div>
  </div>
  <div class="grid-icon-3 grid-border-3">
    <a href="phenomena_photo.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-image ficon3"></i></a><br><br>
    <a href="phenomena_edit.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-pen-to-square ficon3"></i></a><br><br>
    <a href="phenomena.php?delete=<?php echo $record['id']; ?>" onclick="javascript:if(confirm('Are you sure you want to delete this phenomena?')==true){return true;} else {return false;};"><i class="fa-solid fa-trash ficon3"></i></a>
  </div>
  <?php endwhile; ?>
</div>

<p><a href="phenomena_add.php"><i class="fas fa-plus-square"></i> Add UFO Natural Phenomena</a></p>

<script src="https://kit.fontawesome.com/c54b7d85ab.js" crossorigin="anonymous"></script>
<?php

include( 'includes/footer.php' );

?>