<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM projects
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Project has been deleted' );
  
  header( 'Location: projects.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM projects
  ORDER BY date DESC';
$result = mysqli_query( $connect, $query );

?>
<h2>Manage Projects</h2>

<div class="grid-container">
    <div></div>
    <div class="grid-title">ID</div>
    <div class="grid-title">Title</div>
    <div class="grid-title">Type</div>
    <div class="grid-title">Date</div>
    <div></div>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    
    <div >
        <img src="image.php?type=project&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
    </div>
    <div class="grid-id"><div class="grid-title-small">ID</div><?php echo $record['id']; ?></div>
     <div>
        <div class="grid-title-small">Title</div>
        <?php echo htmlentities( $record['title'] ); ?>
        <small><?php echo $record['content']; ?></small>
    </div>
    <div><div class="grid-title-small">Type</div><?php echo $record['type']; ?></div>
    <div style="white-space: nowrap;"><div class="grid-title-small">Date</div><?php echo htmlentities( $record['date'] ); ?></div>
    <div><a href="projects_photo.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-image"></i></a><br><br><a href="projects_edit.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a><br><br>
        <a href="projects.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this project?');"><i class="fa-solid fa-trash"></i></a>
    </div>
    
    
  <?php endwhile; ?>
  </div>

<p><a href="projects_add.php"><i class="fas fa-plus-square"></i> Add Project</a></p>

<script src="https://kit.fontawesome.com/c54b7d85ab.js" crossorigin="anonymous"></script>
<?php

include( 'includes/footer.php' );

?>
