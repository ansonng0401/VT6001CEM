<?php
  if (isset($_GET['blockuserid'])&&isset($_GET['firstname'])&&isset($_GET['lastname'])&&isset($_GET['userid'])) {
    include 'conn.php';

    $sql = "DELETE FROM blocklist WHERE userid=".$_GET['userid']." and blockuserid=".$_GET['blockuserid']."";
  mysqli_query($conn, $sql);
  echo '<script type="text/javascript">';
echo 'window.history.back();';
  echo '</script>'; 
  }
else
header("Location: ../error.php");
?>