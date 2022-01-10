<?php 
include ('inc/db.php');
$admin=1;
  // Insert brand code
$msg="";
$class= '';


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($dbc, $_POST['cate']);
    $check_brand=mysqli_query($dbc, "SELECT * FROM category where category = '$name' " );
       $count=mysqli_num_rows($check_brand);
      if ($count>=1) {
         echo ' <script>alert("bran already  added"); </script> ';
         header('location:brand.php');
      }else{
        $insert=mysqli_query($dbc, "INSERT INTO brands (brand, date_added) VALUES('$name', current_timestamp() ) ");
      
        if($insert){
          echo ' <script>window.open("brand.php" ,"brand added"); </script> ';
         // header('location:brand.php');
        }
      }
       }

     // print_r($get_cate);
     // die(mysqli_error($dbc));
 ?>
<html lang="en">
<head>
    <?php include ('inc/head.php') ?>
    <title>God's Blessing || Categorys</title>
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
 
             <h1 class="pt-4 text-success text-center">God's Blessing Categories</h1>
             
             <!-- starts of container in the page -->
              <div class="container jumbotron pt-0 mt-0 ">
                <!-- starts of rows in the page -->
                <div class="row  p-3">
                    <div class="mb-2">
                    <!-- Modal  Button  -->
                        <form class="was-validated" method="POST">
                          <div class="input-group">
                              <input type="text" name="cate" placeholder="Enter Categorry Name" class="form-control mr-2" required>
                          </div>
                        
                           <button class="btn btn-success btn-rounded " type="submit" name="submit"> Add New Category</button> 
                     </form>
                    <!-- end of modal btn  -->

                    </div>
                    <!-- Begining  of tabel -->
                  <table class="table table-stripe table-dark table-hover">
                      <thead>
                          <tr>
                              <th>S/N</th>
                              <th>CATEGORY</th>
                              <th>DATE ADDED</th>
                              <th class="text-center" rowspan="2">ACTION</th>
                          </tr>
                      </thead>
                      <tbody>
                                                       <?php getbrand(); ?>
                                               </tbody>
                  </table>
                    <!-- Begining  of tabel -->
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
</body>


</html>