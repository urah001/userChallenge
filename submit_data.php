<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>
    <link rel="stylesheet" href="store.css">
</head>

<body>

    <?php
    // Enable error reporting for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Database connection
    $conn = new mysqli("localhost", "root", "", "store");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $itemName = $_POST['itemName'];
    $itemCategory = $_POST['itemCategory'];
    $itemQuantity = intval($_POST['itemQuantity']);

    // Fetch item price from the database
    $sql = "SELECT item_price FROM items WHERE item_name = ? AND item_category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $itemName, $itemCategory);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $itemPrice = $row['item_price'];

        // Insert order into the orders table (exclude total_price)
        $insertSql = "INSERT INTO orders (item_name, item_category, item_price, item_quantity) VALUES (?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);

        // Bind the parameters
        $insertStmt->bind_param("ssii", $itemName, $itemCategory, $itemPrice, $itemQuantity);

        // Execute the query
        if ($insertStmt->execute()) {
            $totalPrice = $itemPrice * $itemQuantity; // Calculate total price locally for display
            echo "<h3>Request Successful!</h3>";
            echo "<p>Item: $itemName</p>";
            echo "<p>Category: $itemCategory</p>";
            echo "<p>Price of One:  ₦$itemPrice</p>";
            echo "<p>Quantity: $itemQuantity</p>";
            echo "<p>Total Price:  ₦$totalPrice</p>";
        } else {
            echo "<h3>Error: Unable to save the order. Please try again.</h3>";
        }
    } else {
        echo "<h3>Item not found in the database. Please check your input.</h3>";
    }

    // Close the connection
    $conn->close();
    ?>

</body>

</html>