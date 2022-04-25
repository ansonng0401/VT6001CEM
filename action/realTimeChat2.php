<?php
ini_set('display_errors', 'off');
session_start();
if (isset($_POST['fromuser']) && isset($_POST['touser'])) {



  $fromuser = $_POST['fromuser'];
  $touser = $_POST['touser'];
  $output = "";

  include('conn.php');






  $userName =  "SELECT * FROM userinfo Where userid = $fromuser";
  $usersql = mysqli_query($conn, $userName) or die(mysqli_error($conn));
  $uName = mysqli_fetch_assoc($usersql);
  $tousername = $uName['firstname'];


  $chatrecsql = "SELECT * FROM chatmessages Where (fromuser =" . $_SESSION['userid'] . " AND touser = " .  $touser . ")OR (fromuser =" . $touser . " AND touser = " . $_SESSION['userid'] . ")";

  // $chatrecsql = "SELECT * FROM chatmessages Where (fromuser =" . $fromuser. " AND touser = " . $touser . ")OR (fromuser =" . $touser . " AND touser = " . $fromuser . ")";
  $chatrec = mysqli_query($conn, $chatrecsql) or die(mysqli_error($conn));
  while ($chat = mysqli_fetch_assoc($chatrec)) {
    if ($chat["fromuser"] == $fromuser) {
      $output .= "<ul class='chat'><li class='right clearfix'><div class='chat-body clearfix'><div class='header'><p>" . $chat["message"] . "
</p></div></li></ul>";
    } else {
      $output .= "<ul class='chat'><li class='left clearfix'><div class='chat-body clearfix'><div class='header'><strong class='primary-font'>$tousername</strong><p>" . $chat["message"] . "
        </p></div></li></ul>";
    }
  }
  echo $output;
  mysqli_close($conn);
}
