<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM ufo_sightings
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Sighting has been deleted' );
  
  header( 'Location: sightings.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM ufo_sightings
  ORDER BY title';
  
$result = mysqli_query( $connect, $query );

// $query = 'SELECT title, location, details, date, photo, photo_credit, encounter_description 
//     FROM ufo_sightings 
//     JOIN encounter_type ON ufo_sightings.encounter_id = encounter_type.id 
//     ORDER BY date DESC';
// $result = mysqli_query( $connect, $query );

?>
<h2>Manage UFO Sightings</h2>

<div class="grid-container">
    <div class="grid-title grid-border"> Photo</div>
    <div class="grid-title grid-border">ID</div>
    <div class="grid-title grid-border">Title</div>
    <div class="grid-title grid-border">Content</div>
    <div class="grid-title grid-border">Date</div>
    <div class="grid-title grid-border">Location</div>
    <div class="grid-title grid-border"></div>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
      <div class="grid-border">
        <div class="grid-title-small grid-photo"> Photo</div>
        <div><img src="image.php?type=sighting&id=<?php echo $record['id']; ?>&width=200&height=200&format=inside"></div>
      </div>
      <div class="grid-border">
        <div class="grid-title-small">ID</div>
        <div class="grid-id"><?php echo $record['id']; ?></div>
      </div>
      <div class="grid-border">
        <div class="grid-title-small">Title</div>
        <div><?php echo htmlentities( $record['title'] ); ?></div>
      </div>
      <div class="grid-border">
        <div class="grid-title-small">Content</div>
        <div class="grid-content"><?php echo $record['content']; ?></div>
      </div>
      <div style="white-space: nowrap;" class="grid-border">
        <div class="grid-title-small">Date</div>
        <div><?php echo htmlentities( $record['date'] ); ?></div>
      </div>
      <div style="white-space: nowrap;" class="grid-border">
        <div class="grid-title-small">Location</div>
        <div class="grid-location-bottom"><?php echo htmlentities( $record['location'] ); ?></div>
      </div>
      <div class="grid-icon grid-border">
          <a href="sightings_photo.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-image ficon"></i></a><br><br>
          <a href="sightings_edit.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-pen-to-square ficon"></i></a><br><br>
          <a href="sightings.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this sighting?');"><i class="fa-solid fa-trash ficon"></i></a>
      </div>
  <?php endwhile; ?>
  </div>

<p><a href="sightings_add.php"><i class="fas fa-plus-square"></i> Add Sighting</a></p>

<script src="https://kit.fontawesome.com/c54b7d85ab.js" crossorigin="anonymous"></script>
<?php

include( 'includes/footer.php' );

?>