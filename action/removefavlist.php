<?php
  if (isset($_GET['addfavuserid'])&&isset($_GET['firstname'])&&isset($_GET['lastname'])&&isset($_GET['userid'])) {
    include 'conn.php';

    $sql = "DELETE FROM favoritelist WHERE userid=".$_GET['userid']." and addfavuserid=".$_GET['addfavuserid']."";
  mysqli_query($conn, $sql);
  echo '<script type="text/javascript">';
echo 'window.history.back();';
  echo '</script>'; 
  }
else
header("Location: ../error.php");
?>