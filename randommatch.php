<!DOCTYPE html>
<?php
include 'header.php';
?>
</head>

<body>
    <div class="container">
</body>
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="matchingmainpage.php">Matching Home Page</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i  class="fa">&#xf074;</i> Random Matching</li>
  </ol>
</nav>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<center>
    <h4 class="display-6"><i  class="fa">&#xf074;</i> Random Matching</h4>
</center>
<?php
require_once('./action/conn.php');
$personalitysql = "SELECT * FROM  userinfo WHERE userid = '$_SESSION[userid]'";
$rs = mysqli_query($conn, $personalitysql) or die(mysqli_error($conn));
while ($rc = mysqli_fetch_assoc($rs)) {
  $userpersonality = $rc['personality'];
}
mysqli_free_result($rs);

extract($_SESSION);
mysqli_close($conn);
if ($userpersonality == "Openness to Experience" || $userpersonality == "Conscientiousness" || $userpersonality == "Extroversion" || $userpersonality == "Agreeableness" || $userpersonality == "Neuroticism") {
?>

<div class="alert alert-info" role="alert">
    <center>
      <h5>Your Personality is <?= $userpersonality ?></h5>
    </center>
  </div>
<?php } else {

?>

  <div class="alert alert-danger" role="alert">
    <center>
      <h5>Please Do The Personality Test</h5>
    </center>
  </div>
<?php
} ?>

<?php

include('./action/conn.php');
$sql = "SELECT * FROM  userinfo  WHERE email != '".$_SESSION['email']."' ORDER BY RAND() LIMIT 1";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

while ($rc = mysqli_fetch_assoc($rs)) {
    $userid = $rc['userid'];
    $email = $rc['email'];
    $firstname = $rc['firstname'];
    $lastname = $rc['lastname'];
    $birth = $rc['birth'];
    $gender = $rc['gender'];
    $personality = $rc['personality'];
    $occupation = $rc['occupation'];
    $interests = $rc['interests'];
    $image = $rc['image'];
}

mysqli_free_result($rs);

$today = date("Y-m-d");
$age = date_diff(date_create($birth), date_create($today));




$sql1 = "select * from favoritelist where userid ='" . $_SESSION['userid'] . "' and addfavuserid = '" .  $userid  . "'";


$favresult = $conn->query($sql1);


if ($favresult->num_rows > 0) {
  $fav = '<form action="./action/adddelfavlist.php" method="POST" style="display: inline;"> 
  <input type="hidden" name="action" id="action" value="deletefavourite" />
  <input type="hidden" name="userid" id="userid" value=' . $_SESSION['userid'] . ' />
  <input type="hidden" name="addfavuserid"  id="addfavuserid" value='.$userid.' />
  <input type="submit" class="btn btn-outline-danger" value="♡ Favorite" ></form>';
} else {
  $fav = '
  <form action="./action/adddelfavlist.php" method="POST" style="display: inline;"> 
  <input type="hidden" name="action" id="action" value="addfavourite" />
  <input type="hidden" name="userid" id="userid" value=' . $_SESSION['userid'] . ' />
  <input type="hidden" name="addfavuserid"  id="addfavuserid" value=' .$userid. ' />
  <input type="submit" class="btn btn-outline-dark" value="♡ Favorite" ></form>';
}
$blcok = '	<form action="./action/addblock.php" method="POST" style="display: inline;"> 
<input type="hidden" name="action" id="action" value="addblock" />
<input type="hidden" name="userid" id="userid" value=' . $_SESSION['userid'] . ' />
<input type="hidden" name="blockuser"  id="blockuser" value='.$userid.' />
<input type="submit" class="btn btn-outline-dark" value="&#x1f512; Block" ></form>';

?>
<Br>
<center>
<div class="card" style="width: 15rem;">
<?php if (empty($image)) {
    echo '<center><img src="./assets/image/defuserimage.png" class="card-img-top"  height="240" alt="user"></center>';
} else {
    echo '<center><img src="data:image;base64,' . $image . '"  class="card-img-top" height="240" "alt="user"></center>';
}          ?>
  <div class="card-body">
    <h5 class="card-title" ><?=$firstname?> <?=$lastname?></h5>
    Age: <?=$age->format('%y');?><br>
Gender: <?=$gender?> <br>
Personality: <?=$personality?><br>
Occupation: <?=$occupation?><br>
Interests: <?=$interests?><hr>
<?=$blcok .' '. $fav?>
<button class="btn btn-outline-secondary"onClick="window.location.reload();"><i  class="fa">&#xf021;</i> Random</button>
<?='<a class="btn btn-success" href="chat.php?toUser='. $userid .'&firstname='. $firstname .'&lastname='. $lastname .'" role="button"><i class="fa fa-comments-o" aria-hidden="true"></i> Chat</a></a>'?>
  </div>


<Center>

</div>
</div>
<br><br>

</html>