<?php
include_once "inc/header.php";

include_once "./classes/Brand.php";
$brand = new Brand();

if (isset($_GET['brandid'])) {
    $id = $_GET['brandid'];
}
?>


<!-- forth child  -->
<div class="row px-5">
    <div class="col-md-10 mt-2">
        <!-- product  -->
        <div class="row">

            <?php

            $getproduct = $brand->brandwiseproduct($id);
            if (mysqli_num_rows($getproduct) > 0) {
                while ($productrow = mysqli_fetch_assoc($getproduct)) {
                    $productimage = $productrow['image_one'];
            ?>
                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <img src="./admin/images/<?php echo $productrow['image_one']; ?>" class="card-img-top" alt="image_one">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $productrow['product_title']; ?></h5>
                                <p class="card-text"><?php echo $productrow['product_des']; ?></p>
                                <p class="card-text"><?php echo $productrow['price']; ?></p>
                                <a href="cart.php?cart=<?php echo $productrow['product_id']; ?>" class="btn btn-info">Add to Cart</a>
                                <a href="products_details.php?details=<?php echo $productrow['product_id']; ?>" class="btn btn-secondary">View more</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<h3 class='text-danger'>There is no Stock in this brand</h3>";
            }
            ?>


            <!-- !product  -->
        </div>
    </div>

    <!-- sidenav -->
    <?php
    include_once "inc/sidebar.php";
    ?>
</div>
</div>
<?php
include_once "inc/footer.php";
?>





<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>