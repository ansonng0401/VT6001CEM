<?php
session_start();


ini_set('display_errors','off');
  include 'conn.php';


if (isset($_POST['upload_image'])) {
  unset($_POST['upload_image']);
  if (isset($_FILES["image"]["name"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $imageName = $_FILES["image"]["name"];
    $imageSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];
    // Image validation
    $validImageExtension = ['jpg', 'jpeg', 'png','JPG','JEPG','PNG'];
    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));

    $image=base64_encode(file_get_contents($tmpName));

    if (!in_array($imageExtension, $validImageExtension)) {
      $_SESSION["update_image_message"] = "Invalid Image Extension";
      $_SESSION["update_image_message_color"] = "danger";
      echo
      "
          <script>
            document.location.href = '../mainpage.php';
          </script>
          ";
    } elseif ($imageSize > 1200000) {
      $_SESSION["update_image_message"] = "Image Size Is Too Large";
      $_SESSION["update_image_message_color"] = "danger";
      echo
      "
          <script>
            document.location.href = '../mainpage.php';
          </script>
          ";
    } else {
      $query = "UPDATE userinfo SET image = '$image' WHERE userid = $id";
      mysqli_query($conn, $query);      
      $_SESSION["update_image_message"] = "Upload Image Success!";
      $_SESSION["update_image_message_color"] = "success";
          mysqli_close($conn);
      echo
      "     <script>
          document.location.href = '../mainpage.php';
          </script>
          ";
    }
  }else
  header("Location: ../error.php");
}elseif (isset($_POST['delete_image'])) {
  unset($_POST['delete_image']);
  if (isset($_POST['id'])) {
    extract($_POST);

    $query = "UPDATE userinfo SET image = '' WHERE userid = $id";
    mysqli_query($conn, $query);
    $_SESSION["update_image_message_color"] = "success";
    $_SESSION["update_image_message"] = "Remove Image Success!";
    mysqli_close($conn);
    echo '<script type="text/javascript">';
    echo 'window.location = "../mainpage.php";';
    echo '</script>'; 
  }else
  header("Location: ../error.php");
}
