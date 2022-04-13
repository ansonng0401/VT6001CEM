<?php
ini_set('display_errors','off');

  include 'conn.php';
if (isset($_FILES["image"]["name"])) {
  $id = $_POST["id"];
  $name = $_POST["name"];
  $imageName = $_FILES["image"]["name"];
  $imageSize = $_FILES["image"]["size"];
  $tmpName = $_FILES["image"]["tmp_name"];
  // Image validation
  $validImageExtension = ['jpg', 'jpeg', 'png'];
  $imageExtension = explode('.', $imageName);
  $imageExtension = strtolower(end($imageExtension));

  $image=base64_encode(file_get_contents($tmpName));

  if (!in_array($imageExtension, $validImageExtension)) {
    echo
    "
        <script>
          alert('Invalid Image Extension');
          document.location.href = '../mainpage.php';
        </script>
        ";
  } elseif ($imageSize > 1200000) {
    echo
    "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = '../mainpage.php';
        </script>
        ";
  } else {
    $query = "UPDATE userinfo SET image = '$image' WHERE userid = $id";
    mysqli_query($conn, $query);
    echo
    "     <script>
        document.location.href = '../mainpage.php';
        </script>
        ";
  }
}else
header("Location: ../error.php");
?>