<!DOCTYPE html>
<?php session_start();
if (isset($_SESSION['email'])||  isset($_SESSION["firstname"]) || isset($_SESSION["lastname"])) {}
 else {
  header("Location: ../index.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- ===== CSS ===== -->







    
    <link rel="stylesheet" href="../assets/CSS/testpg.css">
    <title>Personalised Dating Matching</title>
 

</head>


<body class="p-3 mb-2">



    <div class="container">
        <?php  
echo '<center> User: '. $_SESSION["firstname"]."". $_SESSION['lastname'].'</center><a  href="../mainpage.php"> MainPage</a>   <a href="../action/logoutAction.php" id="logout"> Logout</a>';

?>
</body>


<div class="mx-0 mx-sm-auto">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <i class="far fa-file-alt fa-4x mb-3 text-primary"></i>
                <p>
                    <strong>Personalised Dating Matching_Q1</strong>
                </p>
                <p>
                    I am not a worrier


                </p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 1%"
                        aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <hr />

            <form class="px-4" action="">
                <p class="text-center"></p>

                <div class="form-check mb-2">
                    <input class="form-check-input" value="0" type="radio" name="exampleForm" id="radio2Example1" />
                    <label class="form-check-label" for="radio2Example1">
                        Not at all
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" value="1" type="radio" name="exampleForm" id="radio2Example2" />
                    <label class="form-check-label" for="radio2Example2">
                        Not quite
                    </label>
                </div>
                </label>
                <div class="form-check mb-2">
                    <input class="form-check-input" value="2" type="radio" name="exampleForm" id="radio2Example2" />
                    <label class="form-check-label" for="radio2Example2">
                        Not sure
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" value="3" type="radio" name="exampleForm" id="radio2Example3" />
                    <label class="form-check-label" for="radio2Example3">
                        Somewhat consistent
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" value="4" type="radio" name="exampleForm" id="radio2Example4" />
                    <label class="form-check-label" for="radio2Example4">
                        Fully consistent
                    </label>
                </div>



        </div>

        </form>
    </div>

    <div class="card-footer text-end">
        <button type="button" class="btn btn-primary">Next</button>
    </div>
</div>
</div>

</html>