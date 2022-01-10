<?php 
include ('inc/db.php');
$admin=1;
 ?>
<html lang="en">
<head>
    <?php include ('inc/head.php') ?>
    <title>Admin Dashboard </title>
</head>

<body>
    <!-- start of Navbar -->
       <?php include ('inc/navbar.php') ?>
    <!-- End of navbar  -->

  
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
        <div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" class="form-control" id="usr">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" id="pwd">
</div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
  <!-- the body content/ -->
<div class="container-fluid">
         <div class="row">
        <!-- sidebar/ -->
             <?php include ('inc/sidebar.php') ?>
         <!-- end of side bar -->

            <!-- center of the page  -->
            <div class="col-md-10 "  style="border-left:3px solid #444" >
             <h1 class="pt-4 text-success text-center">God's Blessing Admin Area</h1>
             
             <!-- starts of container in the page -->
              <div class="container jumbotron pt-0 mt-0 ">
                <!-- starts of rows in the page -->
                <div class="row ">
                <!-- start of each col -->
               <!--  <div class="col-md-4 mt-1">
                   <div class="items card p-2">
                   <h4 class="item-name text-center">Dell</h4>
                     <img src="img/1.jpg" width="90%" alt="">
                     <p class="price text-center"><b>Price:</b> #3,000</p>
                    
                     <div class="row">
                       <div class="col-md-6">
                       <div class="p-2">
                        <a href="#" class="btn btn-primary btn-rounded"> Details</a>
                       </div>
                         
                       </div>

                       <div class="col-md-6 " >
                       <div class="p-2">
                          <a href="#" class="btn btn-success btn-rounded"> Add to cart</a>
                       </div>
                          
                       </div>
                     </div>
                    
                   </div>
                </div> -->
                 <!-- End of the col -->

                   <!-- start of each col -->
               <!--  <div class="col-md-4 mt-1">
                   <div class="items card p-2">
                   <h4 class="item-name text-center">Dell</h4>
                     <img src="img/1.jpg" width="90%" alt="">
                     <p class="price text-center"><b>Price:</b> #3,000</p>
                    
                     <div class="row">
                       <div class="col-md-6">
                       <div class="p-2">
                        <a href="#" class="btn btn-primary btn-rounded"> Details</a>
                       </div>
                         
                       </div>

                       <div class="col-md-6 " >
                       <div class="p-2">
                          <a href="#" class="btn btn-success btn-rounded"> Add to cart</a>
                       </div>
                          
                       </div>
                     </div>
                    
                   </div>
                </div> -->
                 <!-- End of the col -->

                   <!-- start of each col -->
               <!--  <div class="col-md-4 mt-1">
                   <div class="items card p-2">
                   <h4 class="item-name text-center">Dell</h4>
                     <img src="img/1.jpg" width="90%" alt="">
                     <p class="price text-center"><b>Price:</b> #3,000</p>
                    
                     <div class="row">
                       <div class="col-md-6">
                       <div class="p-2">
                        <a href="#" class="btn btn-primary btn-rounded"> Details</a>
                       </div>
                         
                       </div>

                       <div class="col-md-6 " >
                       <div class="p-2">
                          <a href="#" class="btn btn-success btn-rounded"> Add to cart</a>
                       </div>
                          
                       </div>
                     </div>
                    
                   </div>
                </div> -->
                 <!-- End of the col -->

              </div>
            <!-- Ends of rows in the page -->

             <!-- starts of rows in the page -->
                <div class="row ">
                <!-- start of each col -->
                <div class="col-md-4 mt-1">
                   <div class="items card p-2">
                   <h4 class="item-name text-center">Dell</h4>
                     <img src="img/1.jpg" width="90%" alt="">
                     <p class="price text-center"><b>Price:</b> #3,000</p>
                    
                     <div class="row">
                       <div class="col-md-6">
                       <div class="p-2">
                        <a href="#" class="btn btn-primary btn-rounded"> Details</a>
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

                   <!-- start of each col -->
                <div class="col-md-4 mt-1">
                   <div class="items card p-2">
                   <h4 class="item-name text-center">Dell</h4>
                     <img src="img/1.jpg" width="90%" alt="">
                     <p class="price text-center"><b>Price:</b> #3,000</p>
                    
                     <div class="row">
                       <div class="col-md-6">
                       <div class="p-2">
                        <a href="#" class="btn btn-primary btn-rounded"> Details</a>
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

                   <!-- start of each col -->
                <div class="col-md-4 mt-1">
                   <div class="items card p-2">
                   <h4 class="item-name text-center">Dell</h4>
                     <img src="img/1.jpg" width="90%" alt="">
                     <p class="price text-center"><b>Price:</b> #3,000</p>
                    
                     <div class="row">
                       <div class="col-md-6">
                       <div class="p-2">
                        <a href="#" class="btn btn-primary btn-rounded"> Details</a>
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