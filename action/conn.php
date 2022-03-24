<?php $conn = mysqli_connect('127.0.0.1', 'root', '', 'VT6002CEM') or die(mysqli_connect_error());

    if ($conn->connect_error) 
    {
        die("Connection failed: ". $conn->connect_error);
    } 
    
    ?>