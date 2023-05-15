<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['description'] )
  {
    
    $query = 'INSERT INTO ufo_natural_phenomena (
        title,
        description,
        details_link,
        photo_cred
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['details_link'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['photo_cred'] ).'"
      )';

    mysqli_query( $connect, $query );
    
    set_message( 'UFO Natural Phenomena has been added' );
    
  }
  
  header( 'Location: phenomena.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add UFO Natural Phenomena</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>

  <label for="photo_cred">Photo Credit:</label>
  <input type="text" name="photo_cred" id="photo_cred" value="<?php echo htmlentities( $record['photo_cred'] ); ?>">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="10"></textarea>
      
  <!-- <script>

  ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script> -->
  
  <br>
  
  <label for="details_link">Details Link:</label>
  <input type="text" name="details_link" id="details_link">

  <br>
  
  <input type="submit" value="Add UFO Natural Phenomena">
  
</form>

<p><a href="phenomena.php"><i class="fas fa-arrow-circle-left"></i>Return to UFO Natural Phenomena List</a></p>


<?php

include( 'includes/footer.php' );

?>