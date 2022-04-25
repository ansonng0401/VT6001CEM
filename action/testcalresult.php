<?php
session_start();
if ((isset($_POST["Q50"]))) {
    $_SESSION["Q50"] = $_POST["Q50"];
} elseif ((isset($_SESSION["Q50"]))) {
} else {
    header("Location: ../p50.php");
}
extract($_SESSION);
include 'conn.php';
for ($q = 1;$q <= 50;$q++) {
    if ((isset($_SESSION['Q' . $q]))) {

     } else {
        header("Location: ../p$q.php");
    }
}

$O = (8 + $Q5 - $Q10 + $Q15 - $Q20 + $Q25 - $Q30 + $Q35 + $Q40 + $Q45 + $Q50);
$C = (14 + $Q3 - $Q8 + $Q13 - $Q18 + $Q23 - $Q28 + $Q33 - $Q38 + $Q43 - $Q48);
$E = (20 + $Q1 - $Q6 + $Q11 - $Q16 + $Q21 - $Q26 + $Q31 - $Q36 + $Q41 - $Q46);
$A = (14 - $Q2 + $Q7 - $Q12 + $Q17 - $Q22 + $Q27 - $Q32 + $Q37 + $Q42 + $Q47);
$N = (38 - $Q4 + $Q9 - $Q14 + $Q19 - $Q24 - $Q29 - $Q34 - $Q39 - $Q44 - $Q49);

$max= max($O, $C, $E, $A, $N);;
if ($O==$max)
{
    $userpersonality="Openness to Experience";
 }elseif($C==$max){
    $userpersonality="Conscientiousness";}
 elseif($E==$max){
  $userpersonality="Extroversion";}
    elseif($A==$max){
       $userpersonality="Agreeableness";}      
         elseif($N==$max){
            $userpersonality="Neuroticism";}

        $personalitysql = "INSERT INTO personalitytestresult (O, C, E, A, N,userid) VALUES ('$O', '$C', '$E', '$A', '$N','$userid')
        ON DUPLICATE KEY UPDATE  `O`=$O,`C`= $C,`E`=$E,A=$A,N=$N, userid=$userid ";
        mysqli_query($conn, $personalitysql) or die(mysqli_error($conn));   
        $usersql =  "UPDATE userinfo SET personality='$userpersonality' WHERE userid=$userid";
        mysqli_query($conn, $usersql) or die(mysqli_error($conn));

        for ($q = 1;$q <= 50;$q++) {
            
                unset($_SESSION['Q' . $q]);
             }
        
        header("Location: ../testresultpg.php");
        mysqli_close($conn);
?>