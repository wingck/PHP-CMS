<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: articles.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title']  )
  {
    
    $query = 'UPDATE ufo_related_articles SET
       title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
       link = "'.mysqli_real_escape_string( $connect, $_POST['link'] ).'" 
       WHERE id = '.$_GET['id'].'
       LIMIT 1';


    mysqli_query( $connect, $query );
    
    set_message( 'UFO Related Article has been updated' );
    
  }

  header( 'Location: articles.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  $query = 'SELECT *
  FROM ufo_related_articles
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
    
    header( 'Location: articles.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit UFO Related Articles</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
    
  <br>
  
  <label for="link">Link:</label>
  <input type="text" name="link" id="link" value="<?php echo htmlentities( $record['link'] ); ?>">
    
  <br>

  <input type="submit" value="Edit UFO Related Articles">


</form>

<p><a href="phenomena.php"><i class="fas fa-arrow-circle-left"></i> Return to UFO Related Articles List</a></p>


<?php

include( 'includes/footer.php' );

?>