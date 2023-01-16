<?php
session_start();

// Connect to the database
$conn = mysqli_connect("localhost", "mamp", "root", "shoe_haven");

// Prepare the SELECT statement to retrieve menu items
$query = "SELECT * FROM Products ORDER BY RAND() LIMIT 4";

// Execute the SELECT statement
$result = mysqli_query($conn, $query);

// Fetch the data from the result set
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the database connection
mysqli_close($conn);

?>
  <?php

// Connect to the database
$conn = mysqli_connect("localhost", "mamp", "root", "shoe_haven");

// Prepare the SELECT statement to retrieve menu items
$query = "SELECT * FROM Products WHERE category_id = 1 ORDER BY RAND() LIMIT 4";

// Execute the SELECT statement
$result = mysqli_query($conn, $query);

// Fetch the data from the result set
$mendata = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the database connection
mysqli_close($conn);

?>
  <?php

// Connect to the database
$conn = mysqli_connect("localhost", "mamp", "root", "shoe_haven");

// Prepare the SELECT statement to retrieve menu items
$query = "SELECT * FROM Products WHERE category_id = 2 ORDER BY RAND() LIMIT 4";

// Execute the SELECT statement
$result = mysqli_query($conn, $query);

// Fetch the data from the result set
$womendata = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the database connection
mysqli_close($conn);

?>
<?php 
// Connect to the database
$conn = mysqli_connect("localhost", "mamp", "root", "shoe_haven");

// Check if the add-to-cart button was clicked
if(isset($_POST['add-to-cart-btn'])) {
    // Get product details from database
    $product_id = $_POST['product_id'];
    $query = "SELECT * FROM Products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    $product_name = $product['name'];
    $product_price = $product['price'];
    $product_image = $product['image'];

    // Add the product to the cart session
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $item = array(
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_price' => $product_price,
        'product_image' => $product_image,
        'quantity' => 1
    );
    array_push($_SESSION['cart'], $item);
}

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
          <button class="btn p-0 px-lg-3" type="submit" id="go-to-cart-btn"><i class="bi bi-cart2" style="color:whitesmoke; font-size:25px"></i></button>
      </div>
    </div>
  </nav>
<div class="container-fluid">
<div class="bd-example">
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
  
    <div class="carousel-inner bg-main">
      <div class="carousel-item active">
        <img src="/Web-Lab-Project/images/bg-main.jpg" class="d-block w-100 bg-main" alt="jordan">
      </div>
      <div class="carousel-item">
        <img src="/Web-Lab-Project/images/yeezy.jpg" class="d-block w-100 bg-main" alt="yeezy">
      </div>
      <div class="carousel-item">
        <img src="/Web-Lab-Project/images/readymade.jpg" class="d-block w-100 bg-main" alt="readymade">
      </div>
    </div>
  </div>
</div>
  <div class="scrollmenu" style="padding-top: 22px;">
      <a>Nike</a>
      <a>Adidas</a>
      <a>Balmain</a>
      <a>Converse</a>
      <a>Vans</a>
      <a>Reebok</a>
      <a>Balenciaga</a>
      <a>Phillip Plein</a>
  </div>
</div>
<div  style="color: whitesmoke; background-color:black; padding: 50px 0px 40px 0px;">
          <ul type="none" style="text-align:center; padding: 0px;">
          <li>
              <h2>Balmain</h2>
          </li>
          <li>
              <h6>Neoprene and leather Unicorn low-top</h6>
          </li>
          <li>
              <p>$780</p>
          </li>
          <li>            
              <img class="img-fluid" style="max-height: 300px; padding: 50px; object-fit: cover;" src="images/balmain.png" alt="lv">
          </li>
          </ul>
</div>
<div class="container-fluid">
  <div class="d-flex justify-content-center" style="padding-top: 4.5rem; padding-bottom: 1rem;">
    <h1>Popular</h1>
  </div>

  <div class="row">
  
    <div class="col-sm-1"></div>
    
    <div class="col-12 col-sm-10">
      <div class="row">
        <?php foreach ($data as $item) : ?>
        <div class="col-lg-3 col-md-4 col-6">
    <div class="card">
        <img src="/Web-Lab-Project/images/<?= $item['image'] ?>" class="card-img-top" alt="<?= $item['image'] ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $item['name'] ?></h5>
            <p class="card-text"><?= $item['description'] ?></p>
            <p>$<?= $item['price'] ?></p>
            <form method="post" action="">
                <input type="hidden" name="product_id" value="<?= $item['id'] ?>"/>
                <input type="submit" name="add-to-cart-btn" class="btn btn-primary" value="Add to cart" />
            </form>
        </div>
    </div>
</div>

        <?php endforeach; ?>
        </div>
      </div>
    <div class="col-sm-1"></div>
  </div>

  <div class="d-flex justify-content-center" style="padding-top: 4.5rem; padding-bottom: 1rem;">
    <h1>Men</h1>
  </div>
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-12 col-sm-10">
      <div class="row">
      <?php foreach ($mendata as $item) : ?>
        <div class="col-lg-3 col-md-4 col-6">
    <div class="card">
        <img src="/Web-Lab-Project/images/<?= $item['image'] ?>" class="card-img-top" alt="<?= $item['image'] ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $item['name'] ?></h5>
            <p class="card-text"><?= $item['description'] ?></p>
            <p>$<?= $item['price'] ?></p>
            <form method="post" action="">
                <input type="hidden" name="product_id" value="<?= $item['id'] ?>"/>
                <input type="submit" name="add-to-cart-btn" class="btn btn-primary" value="Add to cart" />
            </form>
        </div>
    </div>
</div>

        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-sm-1"></div>
  </div>

  <div class="d-flex justify-content-center" style="padding-top: 4.5rem; padding-bottom: 1rem;">
    <h1>Women</h1>
  </div>
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-12 col-sm-10">
      <div class="row">
      <?php foreach ($womendata as $item) : ?>
        <div class="col-lg-3 col-md-4 col-6">
    <div class="card">
        <img src="/Web-Lab-Project/images/<?= $item['image'] ?>" class="card-img-top" alt="<?= $item['image'] ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $item['name'] ?></h5>
            <p class="card-text"><?= $item['description'] ?></p>
            <p>$<?= $item['price'] ?></p>
            <form method="post" action="">
                <input type="hidden" name="product_id" value="<?= $item['id'] ?>"/>
                <input type="submit" name="add-to-cart-btn" class="btn btn-primary" value="Add to cart" />
            </form>
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

  document.querySelectorAll('.add-to-cart-btn').forEach(function(button) {
    button.addEventListener('click', addToCart);
  });


  // Get all "Add to Cart" buttons
  const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');

  // Add click event listener to all "Add to Cart" buttons
  addToCartBtns.forEach(btn => {
    btn.addEventListener('click', e => {
      // Get the product id from the button's "data-item-id" attribute
      const productId = e.target.dataset.itemId;

      // Send an HTTP request to the server with the product id
      fetch('add_to_cart.php', {
        method: 'post',
        body: JSON.stringify({ product_id: productId })
      })
        .then(response => response.json())
        .then(data => {
          // Handle the server's response here
          // ...
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });
  });




document.getElementById("go-to-cart-btn").onclick = function() {
        window.location = "cart.php";
      };
let cart = [];

function addToCart() {
    // Get the product details
    let product = {
        id: 1,
        name: "Product 1",
        price: 50,
        quantity: 1
    };

    // Check if the product is already in the cart
    let index = cart.findIndex(p => p.id === product.id);

    if (index === -1) {
        // Product not found in cart, add it
        cart.push(product);
    } else {
        // Product found in cart, update the quantity
        cart[index].quantity++;
    }

    console.log(cart);
}
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