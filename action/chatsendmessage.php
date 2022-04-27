<?php
ini_set('display_errors','off');
session_start();
date_default_timezone_set('Asia/Taipei');

if (isset($_POST['fromuser'])&&isset($_POST['touser'])&&isset($_POST['message'])) {


 $fromuser=$_POST['fromuser'];
 $touser=$_POST['touser'];
 $message=$_POST['message'];
 $date = date('Y/m/d H:i:s');

 echo"$date";
$output="";


$sql = "INSERT INTO chatmessages (fromuser, touser, message, datetime) Values ('$fromuser','$touser','$message','$date')";
include('conn.php');

if ($conn->query($sql) === TRUE) {
  $output.="";
  mysqli_close($conn);

} else {
  $output.="Error Please Try Again";
  mysqli_close($conn);

}
echo $output;

} else {
 
}
?>

