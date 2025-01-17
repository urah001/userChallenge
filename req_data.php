<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - My Online Store</title>
    <link rel="stylesheet" href="store.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .invoice-container {
            max-width: 900px;
            margin: 20px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h3 {
            color: #333;
            text-align: center;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .invoice-details div {
            width: 48%;
        }

        .invoice-details h4 {
            margin: 10px 0;
            color: #555;
        }

        .invoice-summary {
            margin-top: 30px;
            border-top: 2px solid #ddd;
            padding-top: 20px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-item strong {
            font-weight: bold;
        }

        .total-price {
            font-size: 1.2em;
            font-weight: bold;
            color: #4caf50;
            padding-top: 20px;
        }

        .btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            margin-top: 30px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Invoice</h1>
            <p>Thank you for your purchase! Here are the details of your order:</p>
        </div>

        <?php
        // Enable detailed error reporting for debugging
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Initialize the database connection
        $conn = new mysqli("localhost", "root", "", "store");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Collect form data from the store.html page form
        $itemName = $_POST['itemName'];
        $itemCategory = $_POST['itemCategory'];
        $itemQuantity = intval($_POST['itemQuantity']);

        // Fetch item data from the database
        $sql = "SELECT item_price FROM items WHERE item_name = ? AND item_category = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $itemName, $itemCategory);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $itemPrice = $row['item_price'];

            // Insert data into the orders table 
            $insertSql = "INSERT INTO orders (item_name, item_category, item_price, item_quantity) VALUES (?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);

            // Bind the parameters
            $insertStmt->bind_param("ssii", $itemName, $itemCategory, $itemPrice, $itemQuantity);

            // Execute the query
            if ($insertStmt->execute()) {
                $totalPrice = $itemPrice * $itemQuantity; // Calculate total price for displaying
                echo "
                    <div class='invoice-details'>
                        <div>
                            <h4>Item Name: $itemName</h4>
                            <h4>Category: $itemCategory</h4>
                        </div>
                        <div>
                            <h4>Price: ₦$itemPrice</h4>
                            <h4>Quantity: $itemQuantity</h4>
                        </div>
                    </div>

                    <div class='invoice-summary'>
                        <div class='summary-item'>
                            <span>Item Price</span>
                            <span>₦$itemPrice</span>
                        </div>
                        <div class='summary-item'>
                            <span>Quantity</span>
                            <span>$itemQuantity</span>
                        </div>
                        <div class='summary-item'>
                            <strong>Total</strong>
                            <strong>₦$totalPrice</strong>
                        </div>

                        <div class='total-price'>
                            Total Price: ₦$totalPrice
                        </div>
                    </div>

                    <button class='btn' onclick='payed()'>Proceed to Payment</button>
                ";
            } else {
                echo "<div class='error-message'>Error: Unable to save the order. Please try again.</div>";
            }
        } else {
            echo "<div class='error-message'>Item not found in the database. Please check your input.</div>";
        }

        // Close the database connection
        $conn->close();
        ?>

    </div>
    <script>
        function payed(){
            //shows an alert with details 
            alert("payment successful\n you will be redirected to the store to buy more items");
            //used to redirect user to another page
           window.location.href="store.html";
        }
    </script>
</body>

</html>
