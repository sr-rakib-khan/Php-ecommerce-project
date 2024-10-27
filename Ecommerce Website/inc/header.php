<?php
include_once "./classes/Ipaddress.php";
$ip = new Ipaddress();
$get_ip = $ip->getIPAddress();


include_once "./classes/Cart.php";
$cart = new Cart();
if (isset($_GET['cart'])) {
    $cart_item = $cart->cart_item($get_ip);
    $cart_item_price = $cart->cart_item_price($get_ip);
} else {
    $cart_item = $cart->cart_item($get_ip);
    $cart_item_price = $cart->cart_item_price($get_ip);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecommerce Website</title>

    <!-- custom css link -->
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info p-3">
            <img src="./images/logo.jpg" class="logo" alt="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_allproduct.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"><sup><?php echo $cart_item; ?></sup></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price:<?php echo $cart_item_price; ?></a>
                    </li>
                </ul>
                <form action="search_product.php" method="get" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <input class="btn btn-outline-light text-dark bg-light my-2 my-sm-0" value="search" name="submit" type="submit" />
                </form>
            </div>
        </nav>

        <!-- second child  -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">login</a>
                </li>
            </ul>
        </nav>

        <!-- third child  -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">communication is the heart of e-commerce and community</p>
        </div>