<?php
if (isset($_POST['email']))
{
    extract($_POST);
    $conn = mysqli_connect('ansonng0401.diskstation.me', 'FYP', 'HelloWorld2020!2020', 'fypdb') or die(mysqli_connect_error());

    include ("../PHPMailer/class.phpmailer.php");
    ini_set("SMTP", "smtp.gmail.com");
    ini_set("sendmail_from", "<email-address>@gmail.com>");

    if ($subscriber = 1)
    {
        date_default_timezone_set('Asia/Shanghai');
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO subscriber (sub_email,sub_date) VALUES ('$email', '$date') ON DUPLICATE KEY UPDATE  sub_email = '$email', sub_date = '$date';";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }

    $sql = "SELECT * FROM userinfo WHERE email = '$email'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($rs) > 0)
    {
        echo '<script type="text/javascript">';
        echo 'alert("此電郵地址已經註冊 !");';
        echo 'window.location = "../index.php";';
        echo '</script>';
    }
    else
    {
        extract($_POST);
        $sha512psw = hash('sha512', $Psw);
        $status = "Not Activate";
        $sql = "INSERT INTO userinfo (name, sex, birthday, password, type, email, tel, area, address,status) VALUES ('$name', '$sex', '$date', '$sha512psw', '$type','$email','$tel','$location','$address','$status')";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (mysqli_affected_rows($conn) > 0)
        {

            mysqli_free_result($rs);
            mysqli_Close($conn);
            $emailencode = base64_encode($email);
            $mail = new PHPMailer(); //建立新物件
            $mail->IsSMTP(); //設定使用SMTP方式寄信
            $mail->SMTPAuth = true; //設定SMTP需要驗證
            $mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
            $mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機
            $mail->Port = 465; //Gamil的SMTP主機的SMTP埠位為465埠。
            $mail->CharSet = "utf8"; //設定郵件編碼
            $mail->Username = "wnhl.inc@gmail.com"; //設定驗證帳號
            $mail->Password = "HelloWorld2020!2020"; //設定驗證密碼
            $mail->From = "wnhl.inc@gmail.com"; //設定寄件者信箱
            $mail->FromName = "WNHL.Inc"; //設定寄件者姓名
            $mail->Subject = "WNHL.Inc 註冊郵件"; //設定郵件標題
            $mail->AddEmbeddedImage('../assets/images/header-logo.png', 'my-attach', '../assets/images/header-logo.png');
            $mail->Body = "<center><img alt='WNHL.Inc' height='55' src='cid:my-attach'><br>
                                <h2>Welcome to WNHL.Inc! 
                                    <br>請按 <a href='https://www.wnhl.tk/tc/Activate.php?email=$emailencode'>此</a> 啟動帳戶
                                    <h4><br>請不要回覆此電子郵件。 如有任何疑問，請聯繫wnhl.inc@gmail.com
                                        <br> 版權 © 2020-2021 WNHL.Inc<br></center>"; //設定郵件內容
            $mail->IsHTML(true); //設定郵件內容為HTML
            $mail->AddAddress($email, "WNHL 新用戶"); //設定收件者郵件及名稱
            if (!$mail->Send())
            {
                echo "Mailer Error: " . $mail->ErrorInfo;
                header("Location: ../error.php"); 
            }
            else
            {
                echo '<script type="text/javascript">';
                echo 'alert("電郵已發送，請檢查！");';
                echo 'window.location = "../index.php";';
                echo '</script>';
            }

        }
        else
        {
            header("Location: ../error.php"); 
        }
    }

}
else   {
    header("Location: ../error.php"); 
}

?>
