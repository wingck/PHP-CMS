<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['encounter_description'] ) )
{
  
  if( $_POST['encounter_description'] )
  {
    
    $query = 'INSERT INTO ufo_encounter_type (
        encounter_description
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['encounter_description'] ).'"
      )';

    mysqli_query( $connect, $query );
    
    set_message( 'Encounter Type has been added' );
    
  }
  
  header( 'Location: encounters.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add UFO Encounter Type</h2>

<form method="post">
  


  <label for="title">UFO Encounter Description</label>
  <input type="text" name="encounter_description" id="encounter_description">
    
  <br>
  
  <br>
  
  <input type="submit" value="Add Encounter Type">
  
</form>

<p><a href="encounters.php"><i class="fas fa-arrow-circle-left"></i>Return to UFO Encounter Types</a></p>


<?php

include( 'includes/footer.php' );

?>