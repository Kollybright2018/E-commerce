<?php 

$admin=1;
 ?>
<html lang="en">
<head>
    <?php include ('inc/head.php') ?>
    <title>God's Blessing || Insert Brands</title>
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
 
  
             <h1 class="pt-4 text-success text-center">God's Blessing Brands</h1>
             
             <!-- starts of container in the page -->
              <div class="container jumbotron pt-0 mt-0 ">
                <!-- starts of rows in the page -->
                <!-- <div class="row  p-3"> -->
                    <div class="mb-2">
                    <!-- Modal  Button  -->
                    <a href="Brand.php"> 
                     <button class="btn btn-success btn-rounded">View Brands</button> 
                    </a>
                        
                    <!-- end of modal btn  -->

                 
                    </div>
                    <!-- Begining  of form -->
                     <form class="inline-form was-validated" method="POST">
                          <div class="input-group">
                              <input type="text" name="brand" placeholder="Enter Brand Name" class="form-control" required>
                              <button class="btn btn-success">Submit</button>
                          </div>
                     </form>
                    <!-- Begining  of form -->
            <!--   </div> -->
            <!-- Ends of rows in the page -->
               <form class="form">
                   
               </form>
            </div>

             <!-- Ends of container in the page -->


            </div>


        </div>
    </div>

<!-- end of the body content -->

<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
<script src="bootstrap/js/bootstrap.bundle.js" ></script>
<script src="bootstrap/js/bootstrap.js" ></script>
<script src="bootstrap/jquery.js" ></script>
<script src="bootstrap/jquey.min.js" ></script>
</body>


</html>