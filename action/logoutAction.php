<?php    
       session_start();
       session_unset();
      //  session_destroy();

      mysqli_close($conn);
       echo '<script type="text/javascript">';
     echo 'window.location = "../index.php";';
       echo '</script>';     
   ?>

  