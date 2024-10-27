<?php
include_once "inc/header.php";
include_once "./classes/Insert_product.php";
$product = new Insertproduct();

include_once "./classes/Ipaddress.php";
$ip = new Ipaddress();

include_once "classes/Ipaddress.php";
$ip = new Ipaddress();
include_once "classes/Cart.php";
$cart = new Cart();


if (isset($_GET['cart'])) {
    $product_id = $_GET['cart'];
    $ipaddress = $ip->getIPAddress();

    $insertcart = $cart->insertcartitem($product_id, $ipaddress);
    echo $insertcart;
}


if (isset($_POST['update_cart'])) {
    $ipaddress = $ip->getIPAddress();
    $quantity = $_POST['quantity'];
    echo $quantity;
    // $update_cart = $cart->update_item_quantity($quantity, $ipaddress);
    // if ($update_cart) {
    //     echo "ok";
    // }
}


?>


<!-- forth child  -->
<div class="container">
    <div class="row">
        <form action="" method="post">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan="2">Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $get_data = $cart->show_item_cartpage($ipaddress);
                    if ($get_data) {
                        $total_price = 0;
                        while ($row = mysqli_fetch_array($get_data)) {
                            $product_price = array($row['price']);
                            $product_value = array_sum($product_price);
                            $total_price += $product_value;
                    ?>
                            <tr>
                                <td><?php echo $row['product_title']; ?></td>
                                <td><img style="width: 50px;" src="./admin/images/<?php echo $row['image_one']; ?>" alt=""></td>
                                <td><input type="number" name="quantity"></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><input type="checkbox"></td>
                                <td>
                                    <!-- <button class="btn btn-info mx-2 my-2">Update</button> -->

                                    <input class="btn btn-info mx-2 my-2" type="submit" name="update_cart" value="update_cart">
                                    <button class="btn btn-info mx-2 my-2">Remove</button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
            <div>
                <h4>Sub Total: BDT <?php echo $total_price; ?>tk</h4>
                <a href="index.php"><button class="btn btn-info">Continue Shoping</button></a>

                <a href=""><button class="btn btn-info ml-5">Checkout</button></a>
            </div>
    </div>
</div>
</form>
<?php
include_once "inc/footer.php";
?>















<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>