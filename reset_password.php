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

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Send password reset email logic here
        $resetPasswordEmail = "Your password reset email content";
        mail($email, "Password Reset", $resetPasswordEmail);

        echo "Password Reset Email has been sent!";
    } else {
        echo "No user found for that email.";
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>
