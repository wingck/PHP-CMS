<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );


?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <title>UFO Encounters</title>
  <link href="admin/frontend.css" type="text/css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  <script src="https://kit.fontawesome.com/c54b7d85ab.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
        <nav id="main-menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>
                <a href="#">Details</a>
                    <ul>
                    <li><a href="roswell.php">Roswell Incident</a></li>
                        <li><a href="zeta.php">The Zeta Reticuli Incident</a></li>
                        <li><a href="rendlesham.php">Rendlesham Forest Incident</a></li>
                        <li><a href="alaskan.php">Alaskan Coast Incident</a></li>
                        <li><a href="east.php">East Coast GO FAST</a></li>
                    </ul>
                </li>
                <li><a href="phenomena.php">Phenomena</a></li>
                <li><a href="articles.php">Articles</a></li>
            </ul>
        </nav>
  </header>
  <div class="hero-banner">
    <div class="line1">X-file Documentations</div>
    <div class="line2">All Things About UFO</div>
  </div>
  <?php
      $queryFootages = "SELECT *, ufo_sightings.content FROM ufo_footage
      JOIN ufo_sightings
      ON ufo_footage.id = ufo_sightings.footage_id";
      $resultFootages = mysqli_query( $connect, $queryFootages );
  ?>
  <?php while($recordFootages = mysqli_fetch_assoc($resultFootages)): ?>
    <div class="block-section">
      <div class="video-section">
        <div><?php echo $recordFootages['sighting_title']; ?></div>
        <div class="index-footage"><?php echo $recordFootages['youtube_footage']; ?></div>
      </div>
      <div class="content">
        <div class="index-description"><?php echo $recordFootages['content']; ?></div>
        <div class="index-info"><a href="<?php echo $recordFootages['page_name']; ?>">More info&nbsp;<img src="https://cdn-icons-png.flaticon.com/512/6822/6822873.png" width="30px" alt=""></a></div>      
      </div> 
    </div>
  <?php endwhile; ?>
</body>
</html>