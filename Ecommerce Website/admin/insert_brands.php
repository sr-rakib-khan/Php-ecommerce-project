<!-- header  -->
<?php
include_once "inc/header.php";

$a = include_once "../classes/Brand.php";
$br = new Brand();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand = $br->addbarand($_POST);

}
?>

<div class="row mt-5">
    <div class="col-md-6 container-fluid">
        <span>
            <?php
            if (isset($brand)) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $brand; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>
        </span>
        <form action="" method="POST">
            <div class="form-group ">
                <label for="exampleInputEmail1">Insert Brands</label>
                <input type="text" name="brandname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Insert Brands</button>
        </form>
    </div>
</div>

<!-- footer  -->

<?php
include_once "inc/footer.php";
?>