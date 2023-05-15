<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: encounters.php' );
  die();
  
}

if( isset( $_POST['encounter_description'] ) )
{
  
  if( $_POST['encounter_description']  )
  {
    
    $query = 'UPDATE ufo_encounter_type SET
       encounter_description = "'.mysqli_real_escape_string( $connect, $_POST['encounter_description'] ).'"
       WHERE id = '.$_GET['id'].'
       LIMIT 1';


    mysqli_query( $connect, $query );
    
    set_message( 'Encounter Type has been updated' );
    
  }

  header( 'Location: encounters.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  $query = 'SELECT *
  FROM ufo_encounter_type
  WHERE id = '.$_GET['id'].'
  LIMIT 1';
 
  $result = mysqli_query( $connect, $query );

  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: encounters.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit UFO Encounter Type</h2>

<form method="post">
  

  <label for="encounter_description">Encounter Description:</label>
  <textarea type="text" name="encounter_description" id="encounter_description" rows="1"><?php echo htmlentities( $record['encounter_description'] ); ?></textarea>
    
  <br>
  
  <input type="submit" value="Edit Encounter Type">


</form>

<p><a href="encounters.php"><i class="fas fa-arrow-circle-left"></i> Return to UFO Encounter Types List</a></p>


<?php

include( 'includes/footer.php' );

?>