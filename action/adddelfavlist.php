<?php
if (isset($_POST['userid']) && isset($_POST['addfavuserid']) && isset($_POST['action'])) {
  include 'conn.php';
  extract($_POST);

  if ($action == "addfavourite") {
  
    $sql = "INSERT INTO `favoritelist` (`userid`, `addfavuserid`) VALUES ('$userid', '$addfavuserid')";
    mysqli_query($conn, $sql);
    echo '<script type="text/javascript">';
    echo 'window.history.back();';
    echo '</script>';
  }
  if ($action == "deletefavourite") {

    $sql = "DELETE FROM favoritelist WHERE userid=" . $userid . " and addfavuserid=" . $addfavuserid . "";
    mysqli_query($conn, $sql);
    echo '<script type="text/javascript">';
    echo 'window.history.back();';
    echo '</script>';
  }
} else

  header("Location: ../error");
