<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- css link  -->
    <link rel="stylesheet" href="../style.css">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }

    </style>
</head>

<body>


    <!-- navbar  -->
    <div class="container-fluid p-0">

        <!-- first child  -->
        <div class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" class="logo" alt="">
                <div class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- second child  -->
        <div class="bg-light">
            <div class="text-center p-2">
                <h3>Manage Details</h3>
            </div>
        </div>

        <!-- third child  -->

        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="mx-5">
                    <a href="#"><img src="../images/logo.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="insert_categories.php" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="insert_brands.php" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>