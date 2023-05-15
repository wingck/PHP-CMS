<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: phenomena.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title']  )
  {
    
    $query = 'UPDATE ufo_natural_phenomena SET
       title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
       description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
       details_link = "'.mysqli_real_escape_string( $connect, $_POST['details_link'] ).'",
       photo_cred = "'.mysqli_real_escape_string( $connect, $_POST['photo_cred'] ).'"      
       WHERE id = '.$_GET['id'].'
       LIMIT 1';


    mysqli_query( $connect, $query );
    
    set_message( 'UFO natural phenomena has been updated' );
    
  }

  header( 'Location: phenomena.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  $query = 'SELECT *
  FROM ufo_natural_phenomena
  WHERE id = '.$_GET['id'].'
  LIMIT 1';
 
// $query = 'SELECT title, location, content, date, photo, photo_credit, encounter_description, more_info
//     FROM ufo_sightings 
//     JOIN encounter_type ON ufo_sightings.encounter_id = encounter_type.encounter_id 
//     WHERE id = '.$_GET['id'].'
//     LIMIT 1';

  $result = mysqli_query( $connect, $query );

  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: phenomena.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit UFO Natural Phenomena</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
    
  <br>

  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="1"><?php echo htmlentities( $record['description'] ); ?></textarea>
    
  <br>
  

  <label for="details_link">More Details:</label>
  <input type="text" name="details_link" id="details_link" value="<?php echo htmlentities( $record['details_link'] ); ?>">
    
  <br>
  

  <label for="photo_cred">Photo Credit:</label>
  <input type="text" name="photo_cred" id="photo_cred" value="<?php echo htmlentities( $record['photo_cred'] ); ?>">

  <br>

  <input type="submit" value="Edit UFO Natural Phenomena">


</form>

<p><a href="phenomena.php"><i class="fas fa-arrow-circle-left"></i> Return to UFO Natural Phenomena List</a></p>


<?php

include( 'includes/footer.php' );

?>