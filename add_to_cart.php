<?php
session_start();

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
    $product_qty = $_POST['product_qty'];
    // Add the product to the cart session
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if(isset($_SESSION['cart'][$product_id])) {
        // If the product already exists, update the quantity
        $_SESSION['cart'][$product_id]['quantity'] += $product_qty;
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

// Redirect to the cart page
header("Location: cart.php");
?>