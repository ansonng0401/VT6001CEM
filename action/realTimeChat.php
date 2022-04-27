<?php
ini_set('display_errors', 'off');
session_start();
if (isset($_POST['fromuser']) && isset($_POST['touser'])) {

include('conn.php');


$fromuser = $_POST['fromuser'];
$touser = $_POST['touser'];
$output = "";

$chatrecsql = "SELECT * FROM chatmessages Where (fromuser =" . $_SESSION['userid'] . " AND touser = " .  $touser . ")OR (fromuser =" . $touser . " AND touser = " . $_SESSION['userid'] . ")";
$chatrec = mysqli_query($conn, $chatrecsql) or die(mysqli_error($conn));
while ($chat = mysqli_fetch_assoc($chatrec)) {
  if ($chat["fromuser"] == $fromuser) {
    $output .= " <div style='text-align: right;'>
    <p style='background-color:lightblue; word-wrap: break-word;display:inline-block; padding: 5px; border-radius:3px; width:auto; max width:70%;'>
    " . $chat["message"] . "</p></div>" ;
  } else {
    $output .= " <div class='comments'style='text-align: left;'>
    <p style='background-color:yellow; word-wrap: break-word;display:inline-block; padding: 5px; border-radius: 3px; max width:70%;'>
    " . $chat["message"] . "</p></div>";
  }
}

}else{
  echo "<div class='alert alert-success' role='alert'>
  <h4 class='alert-heading'><i class='fa fa-comments-o' aria-hidden='true'></i> Chat</a></h4>
  <p>Please Select Recent Chat Users </p>
  <hr>
  <p class='mb-0'>Or Go To Match Users</p>
</div>";

}
mysqli_close($conn);
echo $output;
