
 <?php   
if($admin==1) { ?> 

<div style="height:auto;" class="col-md-2 bg-success " > 
             <div class="sidebar-menu">
                       <ul>
          
                           <li><a href="#"><b>Categories</b></a></li>
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
                       <ul>
                           <li><a href="#"><b>Categories</b></a></li>
                           <li><a href="#">Laptops</a></li>
                           <li><a href="#">Phones</a></li>
                           <li class="divider"></li>
                           <li><a href="#"><b>Brands</b></a></li>
                           <li><a href="#">Hp</a></li>
                           <li><a href="#">Infinix</a></li>
                       </ul>
                    </div>
            </div>
        <?php } ?>

