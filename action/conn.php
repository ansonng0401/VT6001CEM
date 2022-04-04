<?php $conn = mysqli_connect('remotemysql.com', '5PurCvsoSg', 'urEAXgwFlP', '5PurCvsoSg') or die(mysqli_connect_error());

    if ($conn->connect_error) 
    {
        die("Connection failed: ". $conn->connect_error);
    } 
    
    ?>