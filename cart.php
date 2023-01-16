<?php 
session_start();

// Check if the cart session is set
if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $total = 0;
}

if(isset($_POST['add-to-cart-btn'])) {
    $product_id = $_POST['add-to-cart-btn'];
    $product_quantity = $_POST['product_quantity'];
    $product = getProductById($product_id); // Call your function to get the product details by id
    $product_name = $product['name'];
    $product_price = $product['price'];
    $product_image = $product['product_image'];
    
    // check if the product is already in the cart
    if(isset($_SESSION['cart'][$product_id])) {
        // if the product is already in the cart, update the quantity
        $_SESSION['cart'][$product_id]['quantity'] += $product_quantity;
    } else {
        // if the product is not in the cart, add it
        $_SESSION['cart'][$product_id] = array(
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => $product_quantity,
            'image' => $product_image
        );
    }
}
function getProductById($product_id) {
    // Connect to the database
    $conn = new mysqli('localhost', 'mamp', 'host', 'shoe_haven');
    // Check for errors
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Prepare the select statement
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    // Bind the product id parameter
    $stmt->bind_param("i", $product_id);
    // Execute the statement
    $stmt->execute();
    // Get the result
    $result = $stmt->get_result();
    // Fetch the product as an associative array
    $product = $result->fetch_assoc();
    // Close the statement and connection
    $stmt->close();
    $conn->close();
    // Return the product
    return $product;
}

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
  <div class="container">
    <h1 class="text-center my-5">Cart</h1>
      <div class="container-fluid mb-4">
        <div class="row justify-content-center" style="border-bottom:1px solid black;">
            <div class="col-2">
                <p>Image</p>
            </div>
            <div class="col-2">
                <p>Name</p>
            </div>
            <div class="col-2">
                <p>Price</p>
            </div>
            <div class="col-2">
                <p>Quantity</p>
            </div>
            <div class="col-2">
                <p>Total</p>
            </div>
            <div class="col-2">
                <p>Actions</p>
            </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row justify-content-center">
        <?php foreach ($_SESSION['cart'] as $item): ?>
        <div class="col-2">
            <img src="images/<?= $item['product_image'] ?>" class="img-fluid" style="width:100px;" alt="">
        </div>
        <div class="col-2">
            <p><?= $item['product_name'] ?></p>
        </div>
        <div class="col-2">
            <p>$<?= $item['product_price'] ?></p>
        </div>
        <div class="col-2">
            <p><?= $item['quantity'] ?></p>
        </div>
        <div class="col-2">
            <p>$<span id="<?= $item['product_id'] ?>-total"><?= $item['product_price'] * $item['quantity'] ?></span></p>
        </div>
            <div class="col-2">
            <button class="btn btn-danger" type="submit" name="remove-item-btn" onclick="removeProduct(<?= $item['product_id'] ?>)" value="<?= $item['product_id'] ?>"><i class="btn bi-x-lg p-0" style="color:whitesmoke;"></i></button>
            </div><?php $total += $item['product_price'] * $item['quantity'] ?>
            <?php endforeach; ?>
        </div>
      </div>

    <div class="py-5">
    <h4 class="text-center py-4">Total: $<span id="total-price"><?= $total ?></span></h4>
        <center>
      <button class="btn btn-primary" id="add-product-btn">Add Product</button>
      
        <button class="btn btn-success" onclick="checkout()">Checkout</button>
    </center>
</div>
  </div>
  <script>
      document.getElementById("add-product-btn").onclick = function() {
        window.location = "index.php";
      };
document.getElementById("go-to-cart-btn").onclick = function() {
        window.location = "cart.php";
      };

    function calculateTotal() {
        var total = 0;
        <?php foreach($_SESSION['cart'] as $item): ?>
            var quantity = document.getElementById("<?= $item['product_id'] ?>-quantity").value;
            var price = <?= $item['product_price'] ?>;
            document.getElementById("<?= $item['product_id'] ?>-total").innerHTML = (quantity * price).toFixed(2);
            total += quantity * price;
        <?php endforeach; ?>
        document.getElementById("total-price").innerHTML = total.toFixed(2);
    }

  // Checkout function
  function checkout() {
    // Get the total price
    var total = document.getElementById('total-price').innerHTML;
    
    var confirmPurchase = confirm('Are you sure you want to purchase these items for a total of $' + total + '?');
    if (confirmPurchase) {
      window.location = "checkout.php";
    }
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