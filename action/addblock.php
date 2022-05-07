<?php
if (isset($_POST['userid']) && isset($_POST['action']) && isset($_POST['blockuser'])) {
  include 'conn.php';
  extract($_POST);

  if ($action == "addblock") {
  
    $sql = "INSERT INTO `blocklist` (`userid`, `blockuserid`) VALUES ('$userid', '$blockuser')";
    mysqli_query($conn, $sql);
    echo '<script type="text/javascript">';
    echo 'window.history.back();';
    echo '</script>';
  }
  if ($action == "deleteblock") {

    $sql = "DELETE FROM blocklist WHERE userid=" . $userid . " and blockuserid=" . $blockuser . "";
    mysqli_query($conn, $sql);
    echo '<script type="text/javascript">';
    echo 'window.history.back();';
    echo '</script>';
  }
} else

  header("Location: ../error");
