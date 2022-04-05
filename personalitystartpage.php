<!DOCTYPE html>
<?php
include 'header.php';
?>
</head>


<link href="./assets/CSS/testpg.css" rel="stylesheet">

<body>
    <div class="container">
</body>
<div class="mx-0 mx-sm-auto">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <i class="far fa-file-alt fa-4x mb-3 text-primary"></i>
                <p>
                    <strong>Personality Test</strong>
                </p>
            </div>
            <hr />
            <li>The following test contains 50 questions. </li>
            <li>Approximately 5 minutes complete.</li>
            <li>The personality test that</li>
            <li>Help you to understand your personality.</li>
            <li>And user on the dating matching system.</li>
        </div>
        </form>
    </div>
    <div class="card-footer text-end">

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
?> <center> <button type="button" onclick="location.href='p1.php'" class="btn btn-primary">Start</button>
    <button type="button" onclick="location.href='testresultpg.php'" class="btn btn-primary">View Result</button></center>
        <? }else{
?>
        <center> <button type="button" onclick="location.href='p1.php'" class="btn btn-primary">Start</button></center>
        <?
}
?>

    </div>
</div>
</div>

</html>