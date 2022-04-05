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
        $personality = $rc['personality'];
        $occupation = $rc['occupation'];
        $interests = $rc['interests'];
    }

    mysqli_free_result($rs);
    mysqli_close($conn);

    if ($personality=="NULL"){
        $personality="There is no record, Please take the Personality Test.";
    }

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
                     <input type="email" class="form-control" name="email" id="email" placeholder="User email address " value="<?php echo $email ?>" onkeypress="return ignoreSpaces(event)" readonly required>
                     <label for="exampleFormControlInput1"> First Name </label>
                     <input type="text" class="form-control" name="firstname" id="firstname" placeholder="User Firstname " value="<?php echo $firstname ?>" onkeypress="return ignoreSpaces(event)" required>
                     <label for="exampleFormControlInput1"> Last Name </label>
                     <input type="text" class="form-control" name="lastname" id="lastname" placeholder="User Lastname " value="<?php echo$lastname?>" onkeypress="return ignoreSpaces(event)"required>
                     <label for="exampleFormControlInput1"> Birth </label>
                     <input type="date" class="form-control" name="birth" id="birth" placeholder="User Lastname " value="<?php echo $birth ?>" required>
                     <label for="exampleFormControlInput1"> Gender </label><br>
                     <div class="form-check form-check-inline">
                         <label><input class="form-check-input" type="radio" name="gender" value="Male" <?php echo ($gender == 'Male') ? 'checked' : '' ?>>Male&nbsp;&nbsp;</label>
                         <label><input class="form-check-input" type="radio" name="gender" value="Female" <?php echo ($gender == 'Female') ? 'checked' : '' ?>>Female</label>
                     </div> <br>
                     <label for="exampleFormControlInput1"> Occupation </label>
                     <span class="details">Occupation</span>
            <select class="form-select " aria-label=".form-select-sm example" name="occupation" id="occupation" required>
              <option value="<?php echo $occupation ?>"disabled selected><?php echo $occupation?></option>
              <option value="Accountant">Accountant</option>
              <option value="Administrator">Administrator</option>
              <option value="Advertising">Advertising</option>
              <option value="Airport">Airport</option>
              <option value="Architect">Architect</option>
              <option value="Baker">Baker</option>
              <option value="Bakery - Shop Salesman">Bakery - Shop Salesman</option>
              <option value="Bank - Managerial / Clerical Staff">Bank - Managerial / Clerical Staff
              </option>
              <option value="Beautician / Manicurist">Beautician / Manicurist</option>
              <option value="Boarding House Keeper">Boarding House Keeper</option>
              <option value="Book Binder">Book Binder</option>
              <option value="Book Keeper">Book Keeper</option>
              <option value="Books Salesman">Books Salesman</option>
              <option value="Boot & Shoe Maker & Repairer">Boot & Shoe Maker & Repairer</option>
              <option value="Building Caretaker">Building Caretaker</option>
              <option value="Cashier">Cashier</option>
              <option value="Chauffeurs">Chauffeurs</option>
              <option value="Chinese Herbalist / Bonesetter/ Acupuncturist">Chinese Herbalist /
                Bonesetter/ Acupuncturist</option>
              <option value="Chiropractor">Chiropractor</option>
              <option value="Clergymen / Priest">Clergymen / Priest</option>
              <option value="Clinic Nurse">Clinic Nurse</option>
              <option value="Clock & Watch Manufacture & Repair Worker">Clock & Watch Manufacture & Repair
                Worker</option>
              <option value="Collector - Rent">Collector - Rent</option>
              <option value="Commercial Traveler">Commercial Traveler</option>
              <option value="Computer Data Processors">Computer Data Processors</option>
              <option value="Computer Programmer">Computer Programmer</option>
              <option value="Dental Mechanic">Dental Mechanic</option>
              <option value="Dentist">Dentist</option>
              <option value="Doctor / Physician / Surgeon">Doctor / Physician / Surgeon</option>
              <option value="Draughtsman">Draughtsman</option>
              <option value="Driving Instructors">Driving Instructors</option>
              <option value="Electronic Factory Worker">Electronic Factory Worker</option>
              <option value="Florist Salesman">Florist Salesman</option>
              <option value="Fur Salesman">Fur Salesman</option>
              <option value="Garment Worker">Garment Worker</option>
              <option value="Hairstylist">Hairstylist</option>
              <option value="Hospital Nurse">Hospital Nurse</option>
              <option value="Hotel - Clerical Staff">Hotel - Clerical Staff</option>
              <option value="Hotel - Food & Beverage Staff Waiter / Waitress">Hotel - Food & Beverage
                Staff Waiter / Waitress</option>
              <option value="Hotel - Kitchen Staff">Hotel - Kitchen Staff</option>
              <option value="Housewife">Housewife</option>
              <option value="Indoor Cleaning Worker">Indoor Cleaning Worker</option>
              <option value="Indoor Clerk">Indoor Clerk</option>
              <option value="Indoor Sales Representative">Indoor Sales Representative</option>
              <option value="Insurance Agent/Broker">Insurance Agent/Broker</option>
              <option value="Lawyer">Lawyer</option>
              <option value="Lecturer">Lecturer</option>
              <option value="Librarian">Librarian</option>
              <option value="Loss Adjuster">Loss Adjuster</option>
              <option value="Messenger">Messenger</option>
              <option value="Midwife">Midwife</option>
              <option value="Office - Managerial / Clerical Staff	">Office - Managerial / Clerical Staff
              </option>
              <option value="Optician">Optician</option>
              <option value="Outdoor Sales Representative">Outdoor Sales Representative</option>
              <option value="Petrol Station Worker">Petrol Station Worker</option>
              <option value="Pharmacist">Pharmacist</option>
              <option value="Physiotherapist">Physiotherapist</option>
              <option value="Postman">Postman</option>
              <option value="Printing Worker">Printing Worker</option>
              <option value="Property Agent">Property Agent</option>
              <option value="Restaurant / Cafés - Kitchen Staff">Restaurant / Cafés - Kitchen Staff
              </option>
              <option value="Restaurant / Cafés - Waiter / Waitress">Restaurant / Cafés - Waiter /
                Waitress</option>
              <option value="Security Guard">Security Guard</option>
              <option value="Stock Broker">Stock Broker</option>
              <option value="Student">Student</option>
              <option value="Tailor">Tailor</option>
              <option value="Taxi Driver">Taxi Driver</option>
              <option value="Teacher">Teacher</option>
              <option value="Veterinary Surgeon">Veterinary Surgeon</option>
            </select>




                     <label for="exampleFormControlInput1"> Interests </label>
                     <span class="details">Interests</span>
                     <select class="form-select " aria-label=".form-select-sm example" name="interests" id="interests" required>
                         <option value="<?php echo $interests ?>" selected disabled><?php echo $interests?></option>
                         <option value="Read">Read</option>
                         <option value="Sports">Sports</option>
                         <option value="Cooking">Cooking</option>
                         <option value="Food & Drink">Food & Drink</option>
                         <option value="Travel">Travel</option>
                         <option value="Music">Music</option>
                         <option value="Film & TV">Film & TV</option>
                         <option value="Books">Books</option>
                         <option value="Clothing">Clothing</option>
                         <option value="Pets">Pets</option>
                     </select>
                     <label for="exampleFormControlInput1"> Personality </label>
                     <input type="text" class="form-control" name="personality" id="personality" placeholder="User personality " value="<?php echo $personality ?>" readonly required>
                 </div>

                 <center><input type="submit" class="btn btn-danger" value="Save Profile"></center>
             </form>
         </div>

         <div class="tab-pane fade" id="Password" role="tabpanel" aria-labelledby="Password-tab">
             <br>
             <h4>Edit User Password</h4>

             <form method="POST" action="./action/saveUserPasswordAction.php">
                 <input type="hidden" class="form-control" name="email" id="email" placeholder="User email address " value="<?php echo $email ?>" readonly required>
                 <label for="exampleFormControlInput1"> Old Password </label>
                 <input type="password" class="form-control" name=oldpassword pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your old password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" onkeypress="return ignoreSpaces(event)" required>
                 <label for="exampleFormControlInput1"> New Password </label>
                 <input type="password" class="form-control" name=newpassword pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your new password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" onkeypress="return ignoreSpaces(event)" required>
                 <label for="exampleFormControlInput1"> Confirm New Password </label>
                 <input type="password" class="form-control" name=newpasswordConfirm pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your new password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" onkeypress="return ignoreSpaces(event)" required>
                 <small id="passwordHelpInline" class="text-muted">
                     Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more
                     characters.
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
 <script>
    function ignoreSpaces(event) {
        var character = event ? event.which : window.event.keyCode;
        if (character == 32) return false;
    }
  </script>