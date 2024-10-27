     <?php
        include_once "./classes/Category.php";
        $cat = new Category();


        include_once "./classes/Brand.php";
        $brand = new Brand();

        ?>

     <div class="col-md-2 bg-secondary p-0">

         <ul class="navbar-nav me-auto text-center">
             <li class="navbar-item bg-info">
                 <a href="#" class="nav-link text-light">
                     <h4>Delivery Brand</h4>
                 </a>
             </li>
             <?php
                $branddata = $brand->getbranddata();
                if (isset($branddata)) {
                    while ($brandrow = mysqli_fetch_assoc($branddata)) {
                ?>
                     <li class="navbar-item">
                         <a href="brandwise_product.php?brandid=<?php echo $brandrow['brand_id']; ?>&brandname=<?php echo $brandrow['brandname']; ?>" class="nav-link text-light">
                             <?php echo $brandrow['brandname']; ?>
                         </a>
                     </li>
             <?php
                    }
                }
                ?>

         </ul>
         <!-- categories -->

         <ul class="navbar-nav me-auto text-center">
             <li class="navbar-item bg-info">
                 <a href="#" class="nav-link text-light">
                     <h4>Catagories</h4>
                 </a>
             </li>
             <?php
                $catdata = $cat->getcategory();
                if (isset($catdata)) {
                    while ($catrow = mysqli_fetch_assoc($catdata)) {

                ?>
                     <li class="navbar-item">
                         <a href="catwise_product.php?catid=<?php echo $catrow['cat_id']; ?>&catname=<?php echo $catrow['catname']; ?>" class="nav-link text-light">
                             <?php echo $catrow['catname']; ?>
                         </a>
                     </li>
             <?php
                    }
                }
                ?>

         </ul>

     </div>