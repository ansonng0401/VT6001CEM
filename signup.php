<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Personalised Dating Matching</title>
    <link rel="stylesheet" href="assets/CSS/signupstyle.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
<center><div class="title">Personalised Dating Matching</div></center>
<div class="title">Sign-Up</div>
    <div class="content">
      <form action="actiom/SignUpAction"  method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name=firstname placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text"  name=lastname placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name=id placeholder="Enter your email" required>
          </div>

<div class="input-box">
  <span class="details">Birth</span>
  <input type="date" required>
</div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name=password placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" name=confirmpassword placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
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
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
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

</body>
</html>
