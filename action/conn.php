<?php $conn = mysqli_connect('ansonng0401.diskstation.me', 'FYP', 'HelloWorld2020!2020', 'VT6001CEM') or die(mysqli_connect_error());

    if ($conn->connect_error) 
    {
        die("Connection failed: ". $conn->connect_error);
    } 
    
    $connect = new PDO("mysql:host=ansonng0401.diskstation.me;dbname=VT6001CEM", "FYP", "HelloWorld2020!2020");
    ?>