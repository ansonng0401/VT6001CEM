<?php
// ini_set('display_errors','off');
if (isset($_POST['email'])) {
  extract($_POST);

  include 'conn.php';


  $sql = 'UPDATE userinfo SET  `email` = "'.$email.'", `firstname`= "'.$firstname.'",  `lastname`= "'.$lastname.'",`gender` = "'.$gender.'", `birth` = "'.$birth.'"  WHERE `email` = "'.$email.'"';


    mysqli_query($conn, $sql);

    $sql2 = 'UPDATE userinfo SET  `interests` = "'.$interests.'" WHERE `email` = "'.$email.'"';
    mysqli_query($conn, $sql2);
    $sql3 = 'UPDATE userinfo SET `occupation` = "'.$occupation.'" WHERE `email` = "'.$email.'"';
    mysqli_query($conn, $sql3);
    echo '<script type="text/javascript">';
    echo 'alert("Edit User Profile Success! ");';
    echo 'window.location = "../mainpage.php";';
    echo '</script>';
 
}else
header("Location: ../error.php"); 
?>