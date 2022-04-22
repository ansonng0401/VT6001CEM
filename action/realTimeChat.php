<?php
ini_set('display_errors','off');
session_start();
if (isset($_POST['fromuser'])&&isset($_POST['touser'])) {

  if (empty ($_POST['touser'])){

    echo "Go Match";
  }else{

      $fromuser=$_POST['fromuser'];
      $touser=$_POST['touser'];
      $output="";

      include('conn.php');
      $chatrecsql = "SELECT * FROM chatmessages Where (fromuser =" . $_SESSION['userid'] . " AND touser = " .  $touser . ")OR (fromuser =" . $touser . " AND touser = " . $_SESSION['userid'] . ")";

      // $chatrecsql = "SELECT * FROM chatmessages Where (fromuser =" . $fromuser. " AND touser = " . $touser . ")OR (fromuser =" . $touser . " AND touser = " . $fromuser . ")";
      $chatrec = mysqli_query($conn, $chatrecsql) or die(mysqli_error($conn));
      while ($chat = mysqli_fetch_assoc($chatrec)) {
        if ($chat["fromuser"] == $fromuser) {
          $output.="<div class='comments' style='text-align: right;' >
          <p style='background-color:lightblue; word-wrap: break-word;display:inline-block; padding: 5px; border-radius:10px; max width:70%;'>
          " . $chat["message"] . "</p> </div>";
        } 
      else{
 $output.="<div class='comments' style='text-align: left;'>
      <p style='background-color:yellow; word-wrap: break-word;display:inline-block; padding: 5px; border-radius:10px; max width:70%;'>
      " . $chat["message"] . "</p></div>";
        
      }}
      echo $output;
    }

}else {
  header("Location: ../error.php");}