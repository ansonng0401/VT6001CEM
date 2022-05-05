<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .avatar {
        vertical-align: middle;
        margin-top: -6px;
        width: 23px;
        height: 23px;
        border-radius: 50%;
    }

    .disable-select {
        -webkit-touch-callout: none;
        /* iOS Safari */
        -webkit-user-select: none;
        /* Safari */
        -khtml-user-select: none;
        /* Konqueror */
        -moz-user-select: none;
        /* Old version of Firefox */
        -ms-user-select: none;
        /* Internet Explorer or Edge */
        user-select: none;
        /* All modern browsers */
    }

    #myBtn {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Fixed/sticky position */
        bottom: 20px;
        /* Place the button at the bottom of the page */
        right: 30px;
        /* Place the button 30px from the right */
        z-index: 99;
        /* Make sure it does not overlap */
        border: none;
        /* Remove borders */
        outline: none;
        /* Remove outline */
        background-color: #6379C1;
        /* Set a background color */
        color: white;
        /* Text color */
        cursor: pointer;
        /* Add a mouse pointer on hover */
        padding: 15px;
        /* Some padding */
        border-radius: 10px;
        /* Rounded corners */
        font-size: 18px;
        /* Increase font size */
    }



    #myBtn:hover {
        background-color: #555;
    }

    body {

        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<?php session_start();
if (isset($_SESSION['email']) ||  isset($_SESSION["firstname"]) || isset($_SESSION["lastname"])) {
} else {
    header("Location: ./index.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="format-detection" content="telephone=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Personality Love Matching</title>


</head>

<style>

</style>

<body>
    <div class="disable-select">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">

                <a class="navbar-brand" href="mainpage.php">Personality Love Match</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="mainpage.php"><i style="font-size:18px" class="fa fa-home"></i>
                                Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="personalitymainpage.php">Personality</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="matchingmainpage.php">Match</a>
                        </li>

                    </ul>

                    <ul class="navbar-nav  my-2 ">


                        <li class="nav-item">

                            <span class="navbar-text form-inline ">

                                <?php
                                require_once('./action/conn.php');
                                $sql = "SELECT * FROM  userinfo WHERE email = '$_SESSION[email]'";

                                $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                                while ($rc = mysqli_fetch_assoc($rs)) {

                                    $image = $rc['image'];
                                }

                                if (empty($image)) {
                                    echo '<i style="font-size:18px" class="fa">&#xf2bd;</i>';
                                } else {
                                    echo '<i><img src="data:image;base64,' . $image . '"  alt="Avatar" class="avatar"> </i>';
                                }          ?>

                                <?php
                                echo $_SESSION['firstname'];
                                echo ' ';
                                echo $_SESSION['lastname'];

                                ?>
                                &nbsp
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="block.php"> <i style="font-size:20px" class="fa fa-lock"></i>
                                Block</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="favorite.php"> <i style="font-size:18px" class="fa fa-heart"></i>
                                Favorite</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="chat.php"><i style="font-size:20px" class="fa fa-comments"></i>
                                Chat</a>
                        </li>
                    </ul>
                    </span>

                    <span class="navbar-text">
                        <input type="button" onclick="location.href='./action/logoutAction.php'" class="btn btn-info" value="Logout" />


                </div>
        </nav>
    </div>
    <div class="disable-select">

        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
        <script>
            //Get the button
            var mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>