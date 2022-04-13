<?php
ini_set('display_errors','off');
if (isset($_POST['email'])) {
  extract($_POST);
  $sha512oldpsw= hash('sha512', $_POST["oldpassword"]);
  $sha512psw= hash('sha512', $_POST["newpassword"]);
include 'conn.php';

$conn = mysqli_connect('127.0.0.1', 'root', '', 'VT6001CEM') or die(mysqli_connect_error());
   $check = "SELECT * FROM userinfo WHERE email = '$email'";
  $rs = mysqli_query($conn, $check) or die(mysqli_error($conn));
  $rc = mysqli_fetch_assoc($rs);

echo $rc["password"];
   if ($rc["password"] != $sha512oldpsw) {
    echo '<script type="text/javascript">';
    echo 'alert("Old Password Not Match, Please Try Again");';
    echo 'window.location = "../mainpage.php";';
    echo '</script>';
  } 
  else if ($newpassword!= $newpasswordConfirm) {
    echo '<script type="text/javascript">';
    echo 'alert("New Password does not match with New confirm password, please input password Again!");';
    echo 'window.location = "../mainpage.php";';
    echo '</script>';
  } 

 else { 
  $sql = 'UPDATE userinfo SET `password` = "'.$sha512psw.'"WHERE `email` = "'.$email.'"';
    mysqli_query($conn, $sql);
    echo '<script type="text/javascript">';
    echo 'alert("Save Password Success! ");';
    echo 'window.location = "../mainpage.php";';
    echo '</script>';
  }
}else
header("Location: ../error.php"); 
?>