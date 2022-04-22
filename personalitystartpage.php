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
    <li class="breadcrumb-item"><a href="personalitymainpage.php">Personality Home Page</a></li>
    <li class="breadcrumb-item active" aria-current="page">Start Test</li>
  </ol>
</nav>
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
 <h4><div class="alert alert-info" role="alert">
    <center>
       Your Personality is <?=$personality?>
    </center>
</div></h4>
<?php }else{echo "<Br><Br><Br><br>";}?>
<center>
    <h4 class="display-6">Personality Test</h4>
    <img src="./assets/image/BigFive.png" height="340px" width="330px">



</center>

<br>
<?php
if ($personality=="Openness to Experience"||$personality=="Conscientiousness"||$personality=="Extroversion"||$personality=="Agreeableness"||$personality=="Neuroticism") {
?>
<!-- Button trigger modal -->
<center>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        Start The Test
    </button>

    <button type="button" onclick="location.href='testresultpg.php'" class="btn btn-warning">View The Result</button>
</center>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Information of the Personality test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <li>The following test contains 50 questions. </li>
                <li>Approximately 5 minutes complete.</li>
                <li>The personality test that</li>
                <li>Help you to understand your personality.</li>
                <li>And use on the dating matching system.</li>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="location.href='p1.php'" class="btn btn-primary">Start</button>
            </div>
        </div>

    </div>

</div>


<? }else{
?>
<center>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        Start The Test
    </button>
</center>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Information of the Personality test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <li>The following test contains 50 questions. </li>
                <li>Approximately 5 minutes complete.</li>
                <li>The personality test that</li>
                <li>Help you to understand your personality.</li>
                <li>And use on the dating matching system.</li>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="location.href='p1.php'" class="btn btn-primary">Start</button>
            </div>
        </div>

    </div>

</div>

<?
}
?>

</div>
</div>
</div>

</html>