  <?php $admin=''; 
include ('inc/db.php');
$error =[];
$get_pro= mysqli_query($dbc, "SELECT * FROM product order by rand() limit 0, 6");




// To get our product base on category id
if (isset($_GET['c_id'])) {
$c_id= $_GET['c_id'];
$get_pro= mysqli_query($dbc, "SELECT * FROM product WHERE c_id = '$c_id' order by rand() limit 0, 6");
$count = mysqli_num_rows($get_pro);
if ($count==0) {
  $signal = "The brand selected is not Available at the moment pls check back, thanks Were are sorry for the incovinence";
}
}elseif (isset($_GET['b_id'])) {
  // To get our product base on Brand id
   $b_id= $_GET['b_id'];
  $get_pro= mysqli_query($dbc, "SELECT * FROM product WHERE b_id = '$b_id' order by rand() limit 0, 6");
 $count = mysqli_num_rows($get_pro);
 if ($count==0) {
   $signal = "The brand selested is not Available at the moment pls check back, thanks Were are sorry for the incovinence";
 }
}elseif (isset($_GET['go'])) {
//  get serach text
  if (empty($_GET['search'])) {
    $error['search-e']= "Enter Your text";
  }else {
    $search = $_GET['search'];
    $get_pro= mysqli_query($dbc, "SELECT * FROM product WHERE keyword OR p_name OR description like '%$search%' ");
$count = mysqli_num_rows($get_pro);
if ($count==0) {
  $signal = "No result found";
}

  }

}

// call cart function
cart();  

?>
<html lang="en">
<head>
    <?php include ('inc/head.php') ?>
    <title>Welcome to God's Blessing Store</title>
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
            <div class="row bg-dark">
            
              <p class="p-3 display-5">Welcome: <span class=" mr-5 badge badge-primary">Guest</span> Shopping Cart - Total Items:
               <span class=" mr-5 badge badge-primary" > <?php echo count_cart();?></span> 
               Total Price: <span class=" mr-5 badge badge-primary"> <?php echo cart_total_price()?></span>
               <a class="btn btn-info ml-5" href="cart.php">Go to Cart</a> <a class="btn btn-primary ml-5" href="#"> Login</a>
              </p>
              <form action="" method="GET" class="form-inline">
                <input type="text" name="search" placeholder="Search" class="form-control">
                <button name="go" class="btn btn-success ml-2" type="submit"> Go...</button>
              </form>
            </div>
          
             <h1 class="pt-4 text-success text-center">God's Blessing Store</h1>
             
             <!-- starts of container in the page -->
              <div class="container jumbotron pt-0 mt-0 ">
                <!-- starts of rows in the page -->
                    <div class="row ">
                      <?php
                        if (isset($signal)) { ?>
                        <div class="alert alert-danger" >
                          <strong class="text-center"> <?php echo  $signal ;?> </strong>
                        </div>
                        <?php } ?>
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
                          <a href="index.php?cart=<?php echo $pro['p_id']?>" class="btn btn-success btn-rounded"> Add to cart</a>
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
                </div>
             <!-- Ends of container in the page -->
            </div>
        </div>
    </div>

<!-- end of the body content -->

<?php include ('inc/script.php'); ?> 
</body>


</html>