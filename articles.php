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
      $queryArticles = "SELECT * FROM ufo_related_articles";
      $resultArticles = mysqli_query( $connect, $queryArticles );
  ?>
  <div class="article-block">
  <?php while($recordArticles = mysqli_fetch_assoc($resultArticles)): ?>
    <div class="article-sub-block">
        <div><?php echo $recordArticles['title']; ?></div>
        <div class="article-link"><a href="<?php echo $recordArticles['link']; ?>"><?php echo $recordArticles['link']; ?></a></div>
    </div>
   <?php endwhile; ?>
  </div>
</body>
</html>