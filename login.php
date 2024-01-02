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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            echo "Login successful!";
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "Email not found";
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>
