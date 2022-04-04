<!DOCTYPE html>
<?php
include 'header.php';
?>

<?php
if ((isset($_POST["Q50"]))) {
    $_SESSION["Q50"] = $_POST["Q50"];
} elseif ((isset($_SESSION[$RQ]))) {
} else {
    header("Location: ./p50.php");
}
extract($_SESSION);
for ($q = 1;$q <= 50;$q++) {
    if ((isset($_SESSION['Q' . $q]))) {
    } else {
        header("Location: ./p$q.php");
    }
}
$O = (8 + $Q5 - $Q10 + $Q15 - $Q20 + $Q25 - $Q30 + $Q35 + $Q40 + $Q45 + $Q50);
$C = (14 + $Q3 - $Q8 + $Q13 - $Q18 + $Q23 - $Q28 + $Q33 - $Q38 + $Q43 - $Q48);
$E = (20 + $Q1 - $Q6 + $Q11 - $Q16 + $Q21 - $Q26 + $Q31 - $Q36 + $Q41 - $Q46);
$A = (14 - $Q2 + $Q7 - $Q12 + $Q17 - $Q22 + $Q27 - $Q32 + $Q37 + $Q42 + $Q47);
$N = (38 - $Q4 + $Q9 - $Q14 + $Q19 - $Q24 - $Q29 - $Q34 - $Q39 - $Q44 - $Q49);
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
                <p>
                    Result
                </p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
            </div>
            <hr />
            <?php
echo "O=" . $O . "<br>";
echo "C=" . $C . "<br>";
echo "E=" . $E . "<br>";
echo "A=" . $A . "<br>";
echo "N=" . $N . "<br>";
?>
        </div>
    </div>

    </html>