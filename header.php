 
 <!DOCTYPE html>
 <style>
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
</style>
<div class="disable-select">

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

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
     </script>
     <title>Personalised Dating Matching</title>


 </head>

 <style>

</style>
 <body>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
         integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
         integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
         integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
     </script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
         integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
     </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="mainpage.php">Personalised Dating Matching</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
             aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarText">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                     <a class="nav-link" href="mainpage.php">Home <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="personalitymainpage.php">Personality Test</a>

                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="matchPG.php">Matching</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="chat.php">Chat</a>
                 </li>
             </ul>




             <span class="navbar-text">

                 Welcom User <?php
                echo $_SESSION['firstname'];
                echo ' ';
                echo $_SESSION['lastname'];
                
                ?>
                 &nbsp
             </span>

             <span class="navbar-text">
                 <input type="button" onclick="location.href='./action/logoutAction.php'" class="btn btn-info"
                     value="Logout" />

             </span>
         </div>
     </nav>