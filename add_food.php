<?php
$servername = "localhost";
$username = "id21725895_david";
$password = "Test000$";
$dbname = "id21725895_db_erd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $category = $_POST['category'];
  $target_dir = "./uploads";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          $filename = basename($_FILES["image"]["name"]);
          $filepath = $target_file;

          $sql = "INSERT INTO food_items (image, name, price, detail, category) VALUES ('$filepath', '$name', '$price', '$detail', '$category')";
          $queryResult=mysqli_query($conn,$sql);
          if ($queryResult) {
              echo "File uploaded successfully elise.";
          } else {
              echo "Error: " . $sql . "<br>" . $con->error;
          }
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
}
?>

