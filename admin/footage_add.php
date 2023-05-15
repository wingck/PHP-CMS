<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['sighting_title'] ) )
{
  
  if( $_POST['sighting_title'] )
  {
    
    $query = 'INSERT INTO ufo_footage (
        sighting_title,
        youtube_footage
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['sighting_title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['youtube_footage'] ).'"
      )';

    mysqli_query( $connect, $query );
    
    set_message( 'Footage has been added' );
    
  }
  
  header( 'Location: footage.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add UFO Footage</h2>

<form method="post">
  


  <label for="title">UFO Footage</label>
  <input type="text" name="sighting_title" id="sighting_title">
    
  <br>

  <label for="youtube_footage">IFrame</label>
  <input type="text" name="youtube_footage" id="youtube_footage">
  
  <br>
  
  <input type="submit" value="Add Footage">
  
</form>

<p><a href="footage.php"><i class="fas fa-arrow-circle-left"></i>Return to UFO Footage</a></p>


<?php

include( 'includes/footer.php' );

?>