<?php
ini_set('display_errors','off');
if (isset($_POST['newpassword'])&&isset($_POST["oldpassword"])&&isset($_POST["newpasswordConfirm"])) {
  extract($_POST);
  $sha512oldpsw= hash('sha512', $_POST["oldpassword"]);
  $sha512psw= hash('sha512', $_POST["newpassword"]);
include 'conn.php';

   $check = "SELECT * FROM userinfo WHERE email = '$email'";
  $rs = mysqli_query($conn, $check) or die(mysqli_error($conn));
  $rc = mysqli_fetch_assoc($rs);

   if ($rc["password"] != $sha512oldpsw) {
    echo '<script type="text/javascript">';
    echo 'alert("Old Password Not Match, Please Try Again");';
    echo 'window.location = "../mainpage";';
    echo '</script>';
  } 
  else if ($newpassword!= $newpasswordConfirm) {
    echo '<script type="text/javascript">';
    echo 'alert("New Password does not match with New confirm password, please input password Again!");';
    echo 'window.location = "../mainpage";';
    echo '</script>';
  } 

 else { 
  $sql = 'UPDATE userinfo SET `password` = "'.$sha512psw.'" Where `email` = "'.$email.'"';
  mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo '<script type="text/javascript">';
    echo 'alert("Save Password Success! ");';
    echo 'window.location = "../mainpage";';
    echo '</script>';
  }
}else
header("Location: ../error");
