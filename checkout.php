<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sneaker Haven</title>
  <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="styles.css"v=<?php echo time(); ?>>
</head>

<body>
<nav class="sticky-top navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <button id="nav-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler" style="border: none;"><i class="bi bi-list"></i></span>
      </button>
      <a class="navbar-brand" href="/Web-Lab-Project/index.php">Sneaker Haven</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/Web-Lab-Project/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/Web-Lab-Project/men.php">Men</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/Web-Lab-Project/women.php">Women</a>
          </li>
        </ul>
          <button class="btn p-0 px-lg-3" type="submit" id="go-to-cart-btn"><i class="bi bi-cart2" style="color:whitesmoke; font-size:25px"></i></button>
      </div>
    </div>
  </nav>
  <div id="personal-billing-info-form">
    <h1 class="text-center py-5">Personal Details for Delivery</h1>
    <!-- Personal and billing information form fields go here -->
    <form action="submit_order.php" method="post" >
      <div class="row justify-content-center pt-3">
          <div class="col-lg-2 col-3">
            <label for="full_name">Full Name:</label>
          </div>
          <div class="col-lg-2 col-4">
            <input type="text" class="personal-b-inp" id="full_name" name="full_name" required>
          </div>
      </div>
      <div class="row justify-content-center pt-3">
          <div class="col-lg-2 col-3">
            <label for="phone_number">Phone Number:</label>
          </div>
          <div class="col-lg-2 col-4">
            <input type="tel" class="personal-b-inp" id="phone_number" name="phone_number" required>
          </div>
      </div>
      <div class="row justify-content-center pt-3">
          <div class="col-lg-2 col-3">
            <label for="email">Email:</label>
          </div>
          <div class="col-lg-2 col-4">
            <input type="email" class="personal-b-inp" id="email" name="email_address" required>
          </div>
      </div>
      <div class="row justify-content-center pt-3">
          <div class="col-lg-2 col-3">
            <label for="shipping_address">Shipping Address:</label>
          </div>
          <div class="col-lg-2 col-4">
            <textarea id="shipping_address" name="shipping_address" required></textarea>
          </div>
      </div>
      <div class="row justify-content-center pt-3">
          <div class="col-lg-2 col-3">
            <label for="payment_mode">Payment Mode:</label>
          </div>
          <div class="col-lg-2 col-4">
            <select id="payment_mode" name="payment_mode">
              <option value="credit_card">Credit Card</option>
              <option value="paypal">PayPal</option>
              <option value="cod">Cash on Delivery</option>
            </select>          
          </div>
      </div>
      <div class="row justify-content-center pt-3">
        <div class="col-1">
          <input id="billing-btn" class="btn btn-primary" type="submit" name="submit" value="Submit">
        </div>
      </div>
      
    </form>
    
  </div>
  <script>
  document.getElementById("go-to-cart-btn").onclick = function() {
        window.location = "cart.php";
      };
  </script>
<script src="bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>

<footer class="footer-style mt-3">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
            <div class="row footer-menu-wrap  align-items-center justify-content-center">
          <div class=" col-md-4 ">
            <ul class="list-unstyled footer-menu mr-auto">
              <li><a href="#"><span class="bi bi-facebook"></span></a></li>
              <li><a href="#"><span class="bi bi-instagram"></span></a></li>
              <li><a href="#"><span class="bi bi-twitter"></span></a></li>
              <li><a href="#"><span class="bi bi-whatsapp"></span></a></li>
            </ul>
          </div>
          <div class="col-md-5">
          </div>
          <div class="col-md-3 site-logo-wrap pb-3">
              <a href="#" class="site-logo" style="color: white; font-size: 13px;">
                © SNEAKER HAVEN 2022. All rights reserved
              </a>
          </div>
        </div>
        </div>
      </div>
    </div>
</footer>
</html>