<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>online store</title>
  
</head>

<body>
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