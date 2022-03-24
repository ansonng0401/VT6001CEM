 <!DOCTYPE html>


 <?php 

include 'header.php';

require_once ('./action/conn.php');
$sql = "SELECT * FROM  userinfo WHERE email = '$_SESSION[email]'";

$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

while ($rc = mysqli_fetch_assoc($rs))
{
    $email = $rc['email'];
    $firstname = $rc['firstname'];
    $lastname = $rc['lastname'];
}

mysqli_free_result($rs);
mysqli_close($conn);

?>

<br><br>
<div class="container">
<form>
  <div class="form-group">
     <center> <h2> User Info</h2></center>
    <label for="exampleFormControlInput1"> Email address</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="User email address " value="<?php echo $email ?>">
    <label for="exampleFormControlInput1"> First Name </label>
    <input type="test" class="form-control" name="firstname" id="firstname" placeholder="User Firstname " value="<?php echo $firstname ?>">
    <label for="exampleFormControlInput1"> Last Name </label>
    <input type="test" class="form-control" name="lastname" id="lastname" placeholder="User Lastname " value="<?php echo $lastname ?>">

</div>
<button type="button" class="btn btn-danger">Edit</button>

</form>

</div>