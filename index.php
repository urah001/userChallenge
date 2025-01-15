<!DOCTYPE html>
<html>

<body>


  <?php
// Define the number for which we want to find the factorial
$number = 3;

// Initialize result to 1 (factorial of 0 is 1)
$result = 1;

// Use a for loop to calculate factorial
for ($i = 1; $i <= $number; $i++) {
    $result *= $i;  // Multiply result by the current value of $i
}

// Output the result
echo "The factorial of $number is: " . $result;
?>
  

</body>

</html>