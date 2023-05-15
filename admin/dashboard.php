<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

?>

<ul id="dashboard">
  <!--<li>
    <a href="projects.php">
      Manage Projects
    </a>
  </li>-->
  <li>
    <a href="sightings.php">
      Manage UFO Sightings
    </a>
  </li>
  <li>
    <a href="encounters.php">
      Manage UFO Encounter Types
    </a>
  </li>
  <li>
    <a href="phenomena.php">
      Manage UFO Natural Phenomena
    </a>
  </li>
  <li>
    <a href="articles.php">
      Manage UFO Related Articles
    </a>
  </li>
  <li>
    <a href="footage.php">
      Manage UFO Footage
    </a>
  </li>
  <!--<li>
    <a href="skills.php">
      Manage Skills
    </a>
  </li>-->
  <li>
    <a href="users.php">
      Manage Users
    </a>
  </li>
  <!--<li>
    <a href="logout.php">
      Logout
    </a>
  </li>-->
</ul>

<?php

include( 'includes/footer.php' );

?>