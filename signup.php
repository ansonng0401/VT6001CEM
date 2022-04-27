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
  header("Location: mainpage.php");
} else {
}
?>
<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Personality Love Matching</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="assets/CSS/signupstyle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
       <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
          <meta name="format-detection" content="telephone=no">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
  <div class="container">
    <center>
      <div class="Main">Personality Love Matching</div>
    </center>
    <div class="title">Sign-Up</div>
    <div class="content">
      <form action="action/SignUpAction.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" id=firstname name=firstname placeholder="Enter your first name" onkeypress="return ignoreSpaces(event)" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name=lastname placeholder="Enter your last name"  onkeypress="return ignoreSpaces(event)"required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name=email placeholder="Enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter correct email address"  onkeypress="return ignoreSpaces(event)"required>
          </div>

          <div class="input-box">
            <span class="details">Birth</span>
            <input type="date" name=birth min="1900-01-01" max="2015-01-01" required>
          </div>

          <div class="input-box">
            <span class="details">Occupation</span>
            <select class="form-select " aria-label=".form-select-sm example" name="occupation" id="occupation" required>
              <option value="" selected>Select Occupation ...</option>
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
          </div>

          <div class="input-box">
            <span class="details">Interests</span>
            <select class="form-select " aria-label=".form-select-sm example" name="interests" id="interests" required>
              <option value="" selected>Select Interests ...</option>
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
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name=password pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" onkeypress="return ignoreSpaces(event)" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name=confirmpassword pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm your password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"  onkeypress="return ignoreSpaces(event)"required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value=Male checked>
          <input type="radio" name="gender" id="dot-2" value=Female>
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
  </div>
  <script src="script.js"></script>

</body>
<script>
    function ignoreSpaces(event) {
        var character = event ? event.which : window.event.keyCode;
        if (character == 32) return false;
    }
  </script>
</html>
