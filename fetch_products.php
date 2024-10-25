<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "Disha@123456";
$dbname = "shopping_cart"; // Use your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from products table
$sql = "SELECT id, name, price, image FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='product' data-price='" . $row["price"] . "'>";
        echo "<img src='" . $row["image"] . "' alt='" . $row["name"] . "'>";
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p>$" . $row["price"] . "</p>";
        echo "<button onclick=\"addToCart('" . $row["name"] . "', " . $row["price"] . ", '" . $row["image"] . "')\">Add to Cart</button>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
