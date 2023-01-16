<?php
//Start session
session_start();

//Check if form is submitted
if(isset($_POST['submit'])){
    //Retrieve form data
    $full_name = $_POST['full_name'];
$phone_number = $_POST['phone_number'];
$email_address = $_POST['email_address'];
$shipping_address = $_POST['shipping_address'];
$payment_mode = $_POST['payment_mode'];

    //Validate form data
    if(empty($full_name) || empty($phone_number) || empty($email_address) || empty($shipping_address) || empty($payment_mode)){
        //Return error message
        echo "Please fill in all required fields.";
    } else {
        $conn = mysqli_connect("localhost", "mamp", "root", "shoe_haven");

        // Check the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Insert the data into the orders table
        $query = "INSERT INTO Customers (full_name, phone_number, email, shipping_address, payment_mode) VALUES ('$full_name', '$phone_number', '$email_address', '$shipping_address', '$payment_mode')";
        
        $result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        
        // Close the connection
        mysqli_close($conn);
                }
            } else {
                //Return error message
                echo "Invalid request.";
            }