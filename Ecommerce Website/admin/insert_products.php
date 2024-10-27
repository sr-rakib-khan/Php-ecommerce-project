<!-- header  -->
<?php
include_once "inc/header.php";

$a = include_once "../classes/Category.php";
$cat = new Category();

$a = include_once "../classes/Brand.php";
$br = new Brand();

$a = include_once "../classes/Insert_product.php";
$insertproduct = new Insertproduct();


if (isset($_POST['insert_product'])) {
    $insert = $insertproduct->insertproduct($_POST, $_FILES);
}
?>

<div class="row mt-5">
    <div class="col-md-6 container-fluid">
        <span>
            <?php
            if (isset($insert)) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $insert; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>
        </span>
        <form action="" method="POST" enctype="multipart/form-data">

            <!-- product title  -->
            <div class="form-group ">
                <label for="exampleInputEmail1">Product title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="product title">
            </div>

            <!-- product description -->
            <div class="form-group ">
                <label for="exampleInputEmail1">Product description</label>
                <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="product description">
            </div>

            <!-- product keyword -->
            <div class="form-group ">
                <label for="exampleInputEmail1">Product keyword</label>
                <input type="text" name="keyword" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="product keyword">
            </div>

            <!-- selecet category  -->
            <div class="form-group">
                <label for="exampleInputEmail1">Selecet category</label>
                <select class="custom-select" name="catid" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected>Select</option>
                    <?php
                    $getcat = $cat->getcategory();
                    if ($getcat) {
                        while ($catrow = mysqli_fetch_assoc($getcat)) {
                    ?>
                            <option value="<?php echo $catrow['cat_id']; ?>"><?php echo $catrow['catname']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <!-- select brands  -->
            <div class="form-group">
                <label for="exampleInputEmail1">Select brands</label>
                <select class="custom-select" name="brandid" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected>Select</option>
                    <?php
                    $getbrnads = $br->getbranddata();
                    if ($getbrnads) {
                        while ($brandrow = mysqli_fetch_assoc($getbrnads)) {
                    ?>
                            <option value="<?php echo $brandrow['brand_id']; ?>"><?php echo $brandrow['brandname']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <!-- image one  -->
            <div class="form-group ">
                <label for="exampleInputEmail1">Image one</label>
                <input type="file" name="img_one" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <!-- image two  -->
            <div class="form-group ">
                <label for="exampleInputEmail1">Image two</label>
                <input type="file" name="img_two" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <!-- image three  -->
            <div class="form-group ">
                <label for="exampleInputEmail1">Image three</label>
                <input type="file" name="img_three" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <!-- product price  -->
            <div class="form-group ">
                <label for="exampleInputEmail1">Product Price</label>
                <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="product price">
            </div>


            <button type="submit" name="insert_product" class="btn btn-primary">Insert Product</button>
        </form>
    </div>
</div>

<!-- footer  -->

<?php
include_once "inc/footer.php";
?>