<?php
  if (isset($_POST['id'])) {
    extract($_POST);
    include 'conn.php';

  $query = "UPDATE userinfo SET image = '' WHERE userid = $id";
  mysqli_query($conn, $query);
  echo '<script type="text/javascript">';
echo 'window.location = "../mainpage.php";';
  echo '</script>'; 
  }
else
header("Location: ../error.php");
?>