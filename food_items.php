<?php
// Connect to the database
$conn = mysqli_connect("localhost", "id21725895_david", "Test000$", "id21725895_db_erd");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the category from the request
$category = $_GET['category'];

// Prepare the SQL query
$sql = "SELECT * FROM food_items WHERE category = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $category);

// Execute the query
mysqli_stmt_execute($stmt);

// Bind results to variables
mysqli_stmt_bind_result($stmt, $id, $image, $name, $price, $detail, $category);

// Create an array to store the food items
$foodItems = array();

// Fetch the results
while (mysqli_stmt_fetch($stmt)) {
    $foodItem = array(
        "id" => $id,
        "image" => $image,
        "name" => $name,
        "price" => $price,
        "detail" => $detail,
    );
    array_push($foodItems, $foodItem);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Send the food items as a JSON response
header('Content-Type: application/json');
echo json_encode($foodItems);
?>
