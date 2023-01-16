<?php
session_start();
// Connect to the database
$conn = mysqli_connect("localhost", "mamp", "root", "shoe_haven");

// Prepare the SELECT statement to retrieve menu items
$query = "SELECT * FROM Products WHERE category_id = 2";

// Execute the SELECT statement
$result = mysqli_query($conn, $query);

// Fetch the data from the result set
$womendata = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the database connection
mysqli_close($conn);

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
          <button class="btn p-0 px-lg-3" id="go-to-cart-btn" type="submit"><i class="bi bi-cart2" style="color:whitesmoke; font-size:25px"></i></button>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
<h1 class="text-center pt-4 mb-5">Women</h1>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-12 col-sm-10">
      <div class="row">
      <?php foreach ($womendata as $item) : ?>
        <div class="col-lg-3 col-md-4 col-6 mb-lg-5 mb-3">
          <div class="card">
            <img src="/Web-Lab-Project/images/<?= $item['image'] ?>" class="card-img-top" alt="<?= $item['image'] ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $item['name'] ?></h5>
              <p class="card-text"><?= $item['description'] ?></p>
              <p>$<?= $item['price'] ?></p>
              <button type="button" name="addcart" class="btn btn-primary add-to-cart-btn" data-item-id="<?= $item['item_id'] ?>">Add to cart</button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-sm-1"></div>
  </div>
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