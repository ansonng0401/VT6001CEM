 <!DOCTYPE html>


 <?php

    include 'header.php';

    require_once('./action/conn.php');
    $sql = "SELECT * FROM  userinfo WHERE email = '$_SESSION[email]'";

    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    while ($rc = mysqli_fetch_assoc($rs)) {
        $email = $rc['email'];
        $firstname = $rc['firstname'];
        $lastname = $rc['lastname'];
        $birth = $rc['birth'];
        $gender = $rc['gender'];
    }

    mysqli_free_result($rs);
    mysqli_close($conn);

    ?>

 <br> <br> <br> <br>
 <div class="container">

     <ul class="nav nav-tabs" id="myTab" role="tablist">

         <li class="nav-item">
             <a class="nav-link active" id="Profile-tab" data-toggle="tab" href="#Profile" role="tab" aria-controls="Profile" aria-selected="true">User Profile</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Password" role="tab" aria-controls="Password" aria-selected="false">Password</a>
         </li>
     </ul>
     <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="Profile" role="tabpanel" aria-labelledby="home-tab">
             <form method="POST" action="./action/saveUserProfileAction.php">
                 <div class="form-group">
                     <BR>
                     <h4>Edit User Profile</h4>

                     <label for="exampleFormControlInput1"> Email address</label>
                     <input type="email" class="form-control" name="email" id="email" placeholder="User email address " value="<?php echo $email ?>" readonly required>
                     <label for="exampleFormControlInput1"> First Name </label>
                     <input type="text" class="form-control" name="firstname" id="firstname" placeholder="User Firstname " value="<?php echo $firstname ?> "required>
                     <label for="exampleFormControlInput1"> Last Name </label>
                     <input type="text" class="form-control" name="lastname" id="lastname" placeholder="User Lastname " value="<?php echo $lastname ?>"required>
                     <label for="exampleFormControlInput1"> Birth </label>
                     <input type="date" class="form-control" name="birth" id="birth" placeholder="User Lastname " value="<?php echo $birth ?>"required>
                 </div>
                 <label for="exampleFormControlInput1"> Gender </label><br>

                 <div class="form-check form-check-inline">
                     <label><input class="form-check-input" type="radio" name="gender" value="Male" <?php echo ($gender == 'Male') ? 'checked' : '' ?>>Male&nbsp;&nbsp;</label>
                     <label><input class="form-check-input" type="radio" name="gender" value="Female" <?php echo ($gender == 'Female') ? 'checked' : '' ?>>Female</label>
                 </div>
                 <center><input type="submit" class="btn btn-danger" value="Save Profile"></center>
</form>
         </div>
         
         <div class="tab-pane fade" id="Password" role="tabpanel" aria-labelledby="Password-tab">
         <br>
         <h4>Edit User Password</h4>

         <form method="POST" action="./action/saveUserProfileAction.php">
             <label for="exampleFormControlInput1"> Old Password </label>
             <input type="password" class="form-control" name=password pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
             <label for="exampleFormControlInput1"> New Password </label>
             <input type="password" class="form-control" name=newpassword pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
             <label for="exampleFormControlInput1"> Confirm your new Password </label>
             <input type="password" class="form-control" name=newpasswordConfirm pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
             <small id="passwordHelpInline" class="text-muted">
             Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters.
    </small>

<br><br>
             <center><input type="submit" class="btn btn-danger" value="Save Password"></center>
         </div>
</form>
     </div>

 </div>


 <br>

 </form>

 </div>