<!DOCTYPE html>
<?php
include 'header.php';
?>
</head>

<body>
    <div class="container">
</body>
<br>
<style>
button {
    color: #000000;
    font-size: 25px;
    border: 1px solid #000000;
    border-radius: 10px;
   
    cursor: pointer;

}

button:hover {
    color: #454545;
    background-color: #e3e3e3;
}
</style>
<?php
require_once('./action/conn.php');
$personalitysql = "SELECT * FROM  userinfo WHERE userid = '$_SESSION[userid]'";
$rs = mysqli_query($conn, $personalitysql) or die(mysqli_error($conn));
while ($rc = mysqli_fetch_assoc($rs)) {
$personality = $rc['personality'];
}
mysqli_free_result($rs);

extract($_SESSION);
mysqli_close($conn);
if ($personality=="Openness to Experience"||$personality=="Conscientiousness"||$personality=="Extroversion"||$personality=="Agreeableness"||$personality=="Neuroticism") {
?>

<center>
    <h4 class="display-6">Personality Test Main Page</h4>

</center>
<div class="alert alert-info" role="alert">
    <center>
        <h5>Your Personality is <?=$personality?></h5>
    </center>
</div>
<?php }else{echo "";}?>




<center>
<Br>
<button type="button" class="myButton"  style="width:70%; height:250px;" onclick="window.location.href='personalitystartpage.php'">Start Test</button>
<Br>
<br>
<button type="button" class="myButton" style="width: 70%;height:250px;"  onclick="window.location.href='testresultpg.php'">View Result</button>

</center>
</div>
</div>
</div>

</html>