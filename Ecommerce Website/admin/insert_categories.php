<!-- header  -->
<?php
include_once "inc/header.php";
include_once "../classes/Category.php";
$category = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cat = $category->addcategory($_POST);
}
?>

<div class="row mt-5">
    <div class="col-md-6 container-fluid">
        <span>
            <?php
            if (isset($cat)) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $cat; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>
        </span>
        <form action="" method="POST">
            <div class="form-group ">
                <label for="exampleInputEmail1">Insert categories</label>
                <input type="text" name="catname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Insert Categories</button>
        </form>
    </div>
</div>

<!-- footer  -->

<?php
include_once "inc/footer.php";
?>