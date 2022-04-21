<!DOCTYPE html>


<?php
include 'header.php';
require_once('./action/conn.php');


$personalitysql = "SELECT * FROM  userinfo WHERE userid = '$_SESSION[userid]'";
$rs = mysqli_query($conn, $personalitysql) or die(mysqli_error($conn));
while ($rc = mysqli_fetch_assoc($rs)) {
$personality = $rc['personality'];
}
mysqli_free_result($rs);
$personalitytestresultsql = "SELECT * FROM  personalitytestresult WHERE userid = '$_SESSION[userid]'";
$rs1 = mysqli_query($conn, $personalitytestresultsql) or die(mysqli_error($conn));
while ($rc = mysqli_fetch_assoc($rs1)) {
$O = $rc['O'];
$C = $rc['C'];
$E = $rc['E'];
$A = $rc['A'];
$N = $rc['N'];}

extract($_SESSION);
if ($personality=="Openness to Experience"||$personality=="Conscientiousness"||$personality=="Extroversion"||$personality=="Agreeableness"||$personality=="Neuroticism") {
}else{

    header("Location: ./personalitystartpage.php");
}
mysqli_close($conn);
?>

</head>


<body>
</body>


<div class="container">
    <br>
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="personalitymainpage.php">Personality Home Page</a></li>
    <li class="breadcrumb-item active" aria-current="page">Personality Test Result Page</li>
  </ol>
</nav>
    <?php
echo "<h5><div class='alert alert-warning' role='alert'><Center>Your personality is ".$personality."</div></h5></center>";
?>

    <center>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    </center>

    <hr>

    <?php

$numbers=array($O, $C, $E, $A, $N);
rsort($numbers);


$dataPoints = array( 
    array("y" => $O, "label" => "Openness to Experience" ),
    array("y" => $C, "label" => "Conscientiousness" ),
    array("y" => $E, "label" => "Extroversion" ),
    array("y" => $A, "label" => "Agreeableness" ),
    array("y" => $N,"label" => "Neuroticism" ),
);

?>
    <center>
        <h4 class="display-6">Big Five Personality Trait Scores of Test</h4>
    </center>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">O</th>
                <th scope="col">C</th>
                <th scope="col">E</th>
                <th scope="col">A</th>
                <th scope="col">N</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td><?php echo $O?></td>
                <td><?php echo $C?></td>
                <td><?php echo $E?></td>
                <td><?php echo $A?></td>
                <td><?php echo $N?></td>
            </tr>

        </tbody>
    </table>
    <hr>
    <center>
        <h4 class="display-6">Big Five Personality Traits Introduction</h4>
    </center>
    <br>
    <dl class="row">
        <dt class="col-sm-3 text-truncate">Openness to experience</dt>
        <dd class="col-sm-9">
            is the personality trait of seeking new experience and intellectual
            pursuits. High scores may day dream a lot. Low scorers may be very down to earth.
        </dd>

        <dt class="col-sm-3  text-truncate">Conscientiousness</dt>
        <dd class="col-sm-9">is the personality trait of being honest and hardworking. High scorers
            tend to follow rules and prefer clean homes. Low scorers may be messy and cheat others.</dd>

        <dt class="col-sm-3 text-truncate">Extroversion</dt>
        <dd class="col-sm-9">is the personality trait of seeking fulfillment from sources outside the self or
            in community. High scorers tend to be very social while low scorers prefer to work on their
            projects alone.</dd>
        <dt class="col-sm-3 text-truncate">Agreeableness</dt>
        <dd class="col-sm-9">reflects much individuals adjust their behavior to suit others. High scorers
            are typically polite and like people. Low scorers tend to 'tell it like it is'.</dd>
        <dt class="col-sm-3 text-truncate">Neuroticism</dt>
        <dd class="col-sm-9">is the personality trait of being emotional.</dd>


        </center>



    </dl>
    </dd>
    </dl>
    <hr>
    <center><a href="personalitystartpage.php" class="btn btn-info" role="button">Redo Test</a> </center>
    <br>
</div>
</div>
<script>
window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
            text: "Personality Test Result"
        },
        axisY: {
            title: "Big Five Personality Traits"
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## scores",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();

}
</script>

</html>