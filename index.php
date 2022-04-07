
 <?php session_start();
if (isset($_SESSION['email']) ||  isset($_SESSION["firstname"]) || isset($_SESSION["lastname"])) {
    header("Location: mainpage.php");
} else {

}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/CSS/loginstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Personalised Dating Matching</title>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <center><span class="Logotitle">Personalised Dating Matching</span><br></center>
                <span class="title">Login</span>
                <form action="action/loginAction.php"  method="post">
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" value="<?php if(isset($_COOKIE["user_email"])) { echo $_COOKIE["user_email"]; } ?>" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  title="Please enter correct email address" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password"  name= "password" class="password"value="<?php if(isset($_COOKIE["user_password"])) { echo $_COOKIE["user_password"]; } ?>" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                        <input type="checkbox" name="remember" id="remember" value="remember" <?php if(isset($_COOKIE["remember"])) { ?> checked <?php } ?>
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login Now">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="signup.php" class="text signup-link">Sign up now</a>
                    </span>
                </div>
            </div>

            <script src="script.js"></script>

</body>
</html>
