<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: footage.php' );
  die();
  
}

if( isset( $_POST['sighting_title'] ) )
{
  
  if( $_POST['sighting_title']  )
  {
    
    $query = 'UPDATE ufo_footage SET
       sighting_title = "'.mysqli_real_escape_string( $connect, $_POST['sighting_title'] ).'",
       youtube_footage = "'.mysqli_real_escape_string( $connect, $_POST['youtube_footage'] ).'"
       WHERE id = '.$_GET['id'].'
       LIMIT 1';


    mysqli_query( $connect, $query );
    
    set_message( 'Footage has been updated' );
    
  }

  header( 'Location: footage.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  $query = 'SELECT *
  FROM ufo_footage
  WHERE id = '.$_GET['id'].'
  LIMIT 1';
 
  $result = mysqli_query( $connect, $query );

  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: footage.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit UFO Footage</h2>

<form method="post">
  
<label for="sightings_title">Title:</label>
  <input type="text" name="sightings_title" id="sightings_title" value="<?php echo htmlentities( $record['sightings_title'] ); ?>">
    
  <br>

  <label for="youtube_footage">IFrame:</label>
  <textarea type="text" name="youtube_footage" id="youtube_footage" rows="1"><?php echo htmlentities( $record['youtube_footage'] ); ?></textarea>

  <br>
  
  <input type="submit" value="Edit Footage">


</form>

<p><a href="footage.php"><i class="fas fa-arrow-circle-left"></i> Return to UFO Footage List</a></p>


<?php

include( 'includes/footer.php' );

?>