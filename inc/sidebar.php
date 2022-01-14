<?php   

include ('inc/db.php');
if($admin==0) { ?> 

<div style="height:auto;" class="col-md-2 bg-success " > 
             <div class="sidebar-menu">
                       <ul>
                           <li class="bg-light"><a href="#"><b>Categories</b></a></li>
                           <li><a href="product.php">Product</a></li>
                           <li><a href="category.php">Categories</a></li>
                           <li><a href="brand.php">Brand</a></li>
                           <li><a href="customer.php">Customers</a></li>
                            <li><a href="order.php">Orders</a></li>
                           <li><a href="payment.php">View Payment</a></li>
                           <li><a href="logout.php">Log-out</a></li>
                       </ul>
                    </div>
            </div>

<?php  } else {?>
<div style="height:auto;" class="col-md-2 bg-success " > 
             <div class="sidebar-menu">
                 <h1 class="text-left" style="border-left:5px solid yellow" >Category</h1>
                       <ul>
                          <?php getcate(); ?> 
                       </ul>

                       <h1 class="text-left" style="border-left:5px solid yellow" >Brands</h1>
                       <ul>
                          <?php getbrd(); ?> 
                       </ul>
                    </div>
            </div>
        <?php } ?>

