  <?php $admin=''; 
include ('inc/db.php');
$get_pro= mysqli_query($dbc, "SELECT * FROM product order by rand() limit 0, 6");
  ?>
<html lang="en">
<head>
    <?php include ('inc/head.php') ?>
    <title>Kollybright E-Commerce</title>
</head>
<body>
    <!-- start of Navbar -->
       <?php include ('inc/navbar.php') ?>
    <!-- End of navbar  -->

  <!-- the body content/ -->
<div class="container-fluid">
         <div class="row">
        <!-- sidebar/ -->
             <?php include ('inc/sidebar.php') ?>
         <!-- end of side bar -->

            <!-- center of the page  -->
            <div class="col-md-10 "  style="border-left:3px solid #444" >
             <h1 class="pt-4 text-success text-center">God's Blessing Store</h1>
             
             <!-- starts of container in the page -->
              <div class="container jumbotron pt-0 mt-0 ">
                <!-- starts of rows in the page -->
                    <div class="row ">
                <!-- start of each col -->
                <?php foreach ($get_pro as $pro ): ?>
                <div class="col-md-4 mt-1">
                   <div class="items card p-2">
                   <h4 class="item-name text-center"><?php echo $pro['p_name'] ?></h4>
                     <img src="img/<?php echo $pro['image'] ?>" width="90%" height="168" alt="">
                     <p class="price text-center"><b>Price: #<?php echo $pro['price'] ?></b></p>
                    
                     <div class="row">
                       <div class="col-md-6">
                       <div class="p-2">
                        <a href="pro_details.php?details=<?php echo $pro['p_id']?>"class="btn btn-primary btn-rounded"> Details</a>
                       </div>               
                       </div>
                       <div class="col-md-6 " >
                       <div class="p-2">
                          <a href="#" class="btn btn-success btn-rounded"> Add to cart</a>
                       </div>
                          
                       </div>
                     </div>
                    
                   </div>
                </div>
                 <!-- End of the col -->
                    <?php endforeach ?>
                      </div>
            <!-- Ends of rows in the page -->

            </div>

             <!-- Ends of container in the page -->
            </div>
        </div>
    </div>

<!-- end of the body content -->

<?php include ('inc/script.php'); ?> 
</body>


</html>