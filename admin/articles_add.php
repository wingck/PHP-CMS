<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'])
  {
    
    $query = 'INSERT INTO ufo_related_articles (
        title,
        link
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['link'] ).'"
      )';

    mysqli_query( $connect, $query );
    
    set_message( 'UFO Related Article has been added' );
    
  }
  
  header( 'Location: articles.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add UFO Related Articles</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="link">Link:</label>
  <input type="text" name="link" id="link">

  <br>
  
  <input type="submit" value="Add UFO Related Article">
  
</form>

<p><a href="articles.php"><i class="fas fa-arrow-circle-left"></i>Return to UFO Related Article List</a></p>


<?php

include( 'includes/footer.php' );

?>