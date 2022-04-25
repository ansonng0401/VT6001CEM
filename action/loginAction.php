<?php   
   $sha512psw= hash('sha512', $_POST["password"]);

    session_start();
    include 'conn.php';

    $sql = "SELECT * FROM userinfo WHERE email = '".$_POST["email"]."'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    

    if(mysqli_num_rows($rs) > 0){
        $sql2 = "SELECT * FROM userinfo WHERE email = '".$_POST["email"]."'";
        $rs2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        while($rc2 = mysqli_fetch_assoc($rs2)){
            if($rc2['password'] == $sha512psw){
                // if($rc2['status'] == "Activated"){
                    $_SESSION["email"] = $_POST["email"];
                    $_SESSION["userid"] = $rc2["userid"];
                    $_SESSION["firstname"] = $rc2["firstname"];
                    $_SESSION["lastname"] = $rc2["lastname"];
                    if(!empty($_POST["remember"])) {
                        setcookie ("user_email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60), "/", NULL);
                        setcookie ("user_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60), "/", NULL);
                        setcookie ("remember",$_POST["remember"],time()+ (10 * 365 * 24 * 60 * 60), "/", NULL);
                    } else {
                        if(isset($_COOKIE["user_email"])) {
                         setcookie ("useremail","");
                        }
                        if(isset($_COOKIE["user_password"])) {
                         setcookie ("user_password","");
                        }
                       }


                    echo '<script type="text/javascript">';
                 echo 'window.location = "../mainpage.php";';
                    echo '</script>';  
                // }else{
                //     echo '<script type="text/javascript">';
                //     echo'alert("您的帳戶尚未確認 !");';
                //   echo 'window.location = "../UserLoginForm.php";';
                //     echo '</script>';  
                // }
            }elseif($rc2['password'] != $sha512psw){
  
                echo '<script type="text/javascript">';
                echo'alert("Login failed, wrong password, please try again！");';
              echo 'window.location = "../index.php";';
                echo '</script>'; 
            }
        }
    }else{

        echo '<script type="text/javascript">';
        echo'alert("Login failed, no registration record, please try again or sign up a new account!");';
      echo 'window.location = "../index.php";';
        echo '</script>'; 
    }
    mysqli_free_result($rs);
    mysqli_close($conn);
   ?>