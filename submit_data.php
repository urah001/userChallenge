<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert page </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- for debugging -->
    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "root", "", "store");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$item = $_REQUEST['item'];
$quantity = $_REQUEST['quantity'];
$price = $_REQUEST['price']; // Ensure the form includes this field

// Insert query (explicitly specifying columns)
$sql = "INSERT INTO orders (name, email, item, quantity, price) VALUES ('$name', '$email', '$item', '$quantity', '$price')";

// Execute query
if (mysqli_query($conn, $sql)) {
    echo "<h3>Data stored successfully in the database!</h3>";
    echo nl2br("\nName: $name\nEmail: $email\nItem: $item\nQuantity: $quantity\nPrice: $price");
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>

</body>

</html>