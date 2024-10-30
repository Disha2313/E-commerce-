<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";  // Default username
$password = "";      // Default password is empty
$dbname = "shopping_cart"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get products as JSON
function getProductsAsJson($conn) {
    $sql = "SELECT id, name, price, image FROM products";
    $result = $conn->query($sql);

    $products = array();

    if ($result->num_rows > 0) {
        // Add each row to the products array
        while($row = $result->fetch_assoc()) {
            $products[] = array(
                "id" => $row["id"],
                "name" => $row["name"],
                "price" => $row["price"],
                "image" => $row["image"]
            );
        }
    } else {
        return json_encode(array("message" => "0 results"));
    }

    // Return the JSON-encoded products array
    return json_encode($products);
}

// Call the function and echo the JSON data
echo getProductsAsJson($conn);

$conn->close();
?>
