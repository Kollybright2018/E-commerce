<?php $admin=''; 
include ('inc/db.php');
$error =[];
$get_pro= mysqli_query($dbc, "SELECT * FROM product order by rand() limit 0, 6");
 
$ip=  getIp();
$select = mysqli_query($dbc, "SELECT * FROM cart 
                        INNER JOIN product on cart.p_id = product.p_id
                         WHERE cart.ip_addr = '$ip'  ");



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
              <div class="container  pt-0 mt-0 ">
                <form action="" class="form" method="post">
                    <table class="table table-bordered table-stripped">
                        <thead>
                        <tr>
                            <th>Remove</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr> 
                        </thead> 
                        <tbody>
                          <?php
                          foreach ($select as $pro) { ?>
                            <tr>
                                <td><input type="checkbox" name="remove[]" value="" id=""></td>
                                <td>  <b> <?php echo $pro['p_name'] ?></b>  <br><img src="img/<?php echo $pro['image'] ?> " width="60" height="30" name="img" alt="" > <br> <b> <?php echo '#'. $pro['price'] ?></b></td>
                                <td><input type="number" name="quantity"  value="<?php echo $pro['qty'] ?>"> <b></b> </td>
                                <td>   <b> <?php echo $pt= $pro['qty'] * $pro['price'] ?></b></td>
                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                    <div class="row">
                      <div class="col-4">
                        <button name="btn" class="btn btn-primary">Update Cart</button>
                      </div>
                      <div class="col-4">
                        <button name="btn" class="btn btn-success">Continuex</button>
                      </div>
                      <div class="col-4">
                        <a href="" class="btn btn-danger">Check Out</a>
                      </div>

                    </div>
                </form>         
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