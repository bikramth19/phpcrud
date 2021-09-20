<?php include "script.php" ?>

<?php
      require_once "config.php";
      // Show all the Images under Users Table
      $sqlimage = "SELECT file FROM users";
      $imageresult1 = mysqli_query($link,$sqlimage);

      while($rows = mysqli_fetch_assoc($imageresult1))
      {       
          echo'<div class="img-thumbnail rounded float-left m-2"><img height="200" width="200" src="'.$rows['file'].'"> </div>';
      }
?>

