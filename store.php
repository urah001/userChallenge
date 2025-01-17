<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>online store</title>
  
</head>

<body>

<!-- check here -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Online Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        label {
            margin-bottom: 5px;
        }
        input, select {
            padding: 8px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        #priceList {
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        .price-item {
            background-color: #e9e9e9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>My Online Shop</h1>
        <form id="requestForm">
            <label for="itemName">Item Name:</label>
            <input type="text" id="itemName" required>
            
            <label for="itemCategory">Category:</label>
            <select id="itemCategory">
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="books">Books</option>
                <option value="home">Home & Garden</option>
            </select>
            
            <label for="itemQuantity">Quantity:</label>
            <input type="number" id="itemQuantity" min="1" value="1" required>
            
            <button type="submit">Request Price</button>
        </form>
        
        <div id="priceList">
            <h2>Requested Items:</h2>
        </div>
    </div>

    <script src="main.js">
     
    </script>

<!-- check here -->


  <h1>Online Shop</h1>
  <!-- send data to the db -->
  <form action="submit_data.php" method="POST/GET">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required />

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required />

    <label for="item">Item:</label>
    <input type="text" id="item" name="item" required />

    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" required />
    <label for="price">price:</label>
    <input type="number" id="price" name="price" step="0.01" min="1" required />

    <input type="submit" value="submit">
  </form>
</body>

</html>