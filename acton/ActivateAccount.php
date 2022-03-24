<?php
if (isset($_POST['email'])) {
    extract($_POST);
$conn = mysqli_connect('ansonng0401.diskstation.me', 'FYP', 'HelloWorld2020!2020', 'fypdb') or die(mysqli_connect_error());
$status="Activated";
$sql = "update userinfo set status='$status' where email = '$email'";
mysqli_query($conn, $sql) or die(mysqli_error($conn));
echo '<script type="text/javascript">';
echo'alert("確認帳戶成功 !");';
echo 'window.location = "../index.php";';
echo '</script>';  
}
else
header("Location: ../error.php"); 
?>