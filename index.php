<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Journey</title>
  <!-- style link for external css -->
  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <header>
    <h1>Welcome to My Journey in life</h1>
    <nav>
      <!-- anchor tag to navigate user to specific page when clicked  -->
      <a class="links" href="store.php">Shop</a>
      <a class="links" href="paymate_gateway.html">Payment</a>
    </nav>
  </header>
<!-- edit it to your taste -->

  <main>
    <section class="timeline">
      <div class="journey-item">
        <div class="journey-content">
          <p class="journey-date">{date}</p>
          <h2>Born in a {where?}</h2>
          <p>
            I was born in a little town, { describe your town/ environment }
            and friendly faces.
          </p>
        </div>
      </div>
      <div class="journey-item">
        <div class="journey-content">
          <p class="journey-date">{ date }</p>
          <h2>First Day of School</h2>
          <p>
            I stepped into the classroom for the first time, nervous but
            excited about learning and becoming soemthing great.
          </p>
        </div>
      </div>
      <div class="journey-item">
        <div class="journey-content">
          <p class="journey-date">{date}</p>
          <h2>Discovered My Passion</h2>
          <p>
            {how did you discover what you liked}
          </p>
        </div>
      </div>
      <div class="journey-item">
        <div class="journey-content">
          <p class="journey-date">{date}</p>
          <h2>College Years</h2>
          <p>
            {describe how you gained admission and how you school life was}
          </p>
        </div>
      </div>
<!-- you can add more to make it much  -->
      </div>


    </section>
  </main>

  <footer>
    <p>&copy; 2025 My Life Journey. All rights reserved.</p>
  </footer>

  <script src="main.js"></script>
</body>

</html>