<?php
ini_set('display_errors','off');
session_start();
if (isset($_POST['fromuser'])&&isset($_POST['touser'])&&isset($_POST['message'])) {


 $fromuser=$_POST['fromuser'];
 $touser=$_POST['touser'];
 $message=$_POST['message'];

$output="";

$sql = "INSERT INTO chatmessages (fromuser, touser, message) Values ('$fromuser','$touser','$message')";
include('conn.php');

if ($conn->query($sql) === TRUE) {
  $output.="";
} else {
  $output.="Error Please Try Again";
}
echo $output;

} else {
  header("Location: ../error.php");
}
?>

