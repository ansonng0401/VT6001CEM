<?php
// connecting to database
include 'conn.php';

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "🥺😭 Sorry I dont understand! 🥺😭<br>
    You Can Ask:<br>
    1. How to Edit Informations<Br>
    2. How to do the personality test<Br>
    3. What is Personality Test<br>
    4. How To Check the result of Personality<br>
    5. Why need to do personality test<br>
    6. How to match user<Br>
    7. How to chat with users<br>
    8. How to block user<br>
    9. How to add a user to a favourite list";
}

?>