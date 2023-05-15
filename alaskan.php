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
  <title>Alaskan Coast Shootdown</title>
  <link href="admin/frontend.css" type="text/css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
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
  <?php
      $querySightings = "SELECT * FROM ufo_sightings WHERE id = 5";
      $resultSightings = mysqli_query( $connect, $querySightings );
  ?>
  <?php
      $queryEncounter = "SELECT * FROM ufo_encounter_type WHERE id = 1";
      $resultEncounter = mysqli_query( $connect, $queryEncounter );
  ?>
  <?php while($recordSightings = mysqli_fetch_assoc($resultSightings)): ?>
    <div class="sub-block">
        <img src="<?php echo $recordSightings['photo']; ?>"  class="sub-image">
        <div class="sub-block-info">
          <div>Title:&nbsp;<?php echo $recordSightings['title']; ?></div>
          <div>Date:&nbsp;<?php echo $recordSightings['date']; ?></div>
          <div>Location:&nbsp;<?php echo $recordSightings['location']; ?></div>
        <?php while($recordEncounter = mysqli_fetch_assoc($resultEncounter)): ?>
          <div>Encounter type:&nbsp;<?php echo $recordEncounter['encounter_description']; ?></div>
        <?php endwhile; ?>
        </div>
        <div class="sub-content"><?php echo $recordSightings['content']; ?></div>
        <div class="sub-link"><a href="<?php echo $recordSightings['more_info']; ?>">More info</a>&nbsp;<img src="https://cdn-icons-png.flaticon.com/512/6822/6822873.png" width="30px"></div>
    </div>
  <?php endwhile; ?>
</body>
</html>