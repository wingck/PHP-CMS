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
  <title>Roswell Incident</title>
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
      $queryPhenomena = "SELECT * FROM ufo_natural_phenomena";
      $resultPhenomena = mysqli_query( $connect, $queryPhenomena );
  ?>
  <div class="phen-block">
  <?php while($recordPhenomena = mysqli_fetch_assoc($resultPhenomena)): ?>
    <div class="phen-sub-block">
        <img src="<?php echo $recordPhenomena['photo']; ?>" class="phen-sub-image">
        <div><?php echo $recordPhenomena['title']; ?></div>
        <div><?php echo $recordPhenomena['description']; ?></div>
        <div class="sub-link"><a href="<?php echo $recordPhenomena['details_link']; ?>">More info</a>&nbsp;<img src="https://cdn-icons-png.flaticon.com/512/6822/6822873.png" width="30px"></div>
    </div>
    <?php endwhile; ?>
  </div>
</body>
</html>