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

// Get food items by category
function getFoodItemsByCategory($category) {
    global $conn;

    $query = "SELECT * FROM food_items WHERE category = '$category'";
    $result = mysqli_query($conn, $query);

    $foodItems = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $foodItems[] = $row;
    }

    return $foodItems;
}

// Get all food items
function getAllFoodItems() {
    global $conn;

    $query = "SELECT * FROM food_items";
    $result = mysqli_query($conn, $query);

    $foodItems = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $foodItems[] = $row;
    }

    return $foodItems;
}
