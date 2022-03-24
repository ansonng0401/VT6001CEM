<?php session_start();
if (isset($_SESSION['email']) ||  isset($_SESSION["firstname"]) || isset($_SESSION["lastname"])) {
    header("Location: mainpage.php");
} else {

}
?>
<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Personalised Dating Matching</title>
    <link rel="stylesheet" href="assets/CSS/signupstyle.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   </head>
<body>
  <div class="container">
<center><div class="Main">Personalised Dating Matching</div></center>
<div class="title">Sign-Up</div>
    <div class="content">
      <form action="action/SignUpAction.php"  method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" id=firstname name=firstname placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text"  name=lastname placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name=email placeholder="Enter your email"   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  title="Please enter correct email address" required>
          </div>

<div class="input-box">
  <span class="details">Birth</span>
  <input type="date" name=birth min="1900-01-01" max="2015-01-01" required>
</div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name=password pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your password"  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name=confirmpassword pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm your password"  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value=Male checked>
          <input type="radio" name="gender" id="dot-2" value=Female>
          <input type="radio" name="gender" id="dot-3" >
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
<div style="text-align: right;">Return to <a href="index.php">Login</div>
      </form>
    </div>
  </div>
  <script src="script.js"></script>

</body>
</html>
