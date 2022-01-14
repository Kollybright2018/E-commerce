<?php 
include ('inc/db.php');
$admin=1;
$msg ='';
if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($dbc, $_POST['name']);
   $price = mysqli_real_escape_string($dbc, $_POST['price']);
   $c_id = mysqli_real_escape_string($dbc, $_POST['category']);
   $b_id = mysqli_real_escape_string($dbc, $_POST['brand']);
   $keyword = mysqli_real_escape_string($dbc, $_POST['keyword']);
   $quantity = mysqli_real_escape_string($dbc, $_POST['quantity']);
   $description = mysqli_real_escape_string($dbc, $_POST['description']);
   $brand = mysqli_real_escape_string($dbc, $_POST['brand']);
   // get image
   $img = $_FILES["img"]["name"];
   $tempname =$_FILES["img"]["tmp_name"];
   $folder= "img/".$img;
   move_uploaded_file($tempname, $folder);
     $get_pro = mysqli_query($dbc, "SELECT * FROM product WHERE p_name = '$name' AND c_id = '$c_id' ");
   $count_pro = mysqli_num_rows($get_pro);

      if ($count_pro == 0) {
      $insert = mysqli_query($dbc, "INSERT INTO product (p_name,b_id,c_id,price,quantity,keyword,image,description,date_added,date_update) 
    values('$name','$b_id','$c_id','$price','$quantity','$keyword','$img','$description', current_timestamp(), current_timestamp())");     
    echo "<script>alert('Product Has been inserted!')</script>";
    echo "<script>window.open('product.php','_self')</script>";
    //header('location:product.php');
exit();
   }else{ 
     $msg="Item/product Added";
     echo "<script>alert('Item/Product Already Exit Choice Update Pls')</script>";
      echo "<script>window.open('index.php?product','_self')</script>";
   // header('location:product.php');
    exit(); 
   };
   if (isset($_GET['delete'])) {
   $delete =$_GET['delete']; 
   $delete =mysqli_query($dbc, "DELETE FROM product WHERE p_id = '$delete' ") ;
    echo "<script>alert('Item/Product Already Exit Choice Update Pls')</script>";
      echo "<script>window.open('index.php?product','_self')</script>";
  //header('location:course.php');
   exit();

 }else{

 }
 
   // print_r($insert);
   // die;

};

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

  <!-- the body content/ -->
<div class="container-fluid">
         <div class="row">
        <!-- sidebar/ -->
             <?php include ('inc/sidebar.php') ?>
         <!-- end of side bar -->

            <!-- center of the page  -->
            <div class="col-md-10 "  style="border-left:3px solid #444" >
             <h1 class="pt-4 text-success text-center">God's Blessing Admin Area</h1>
             
              <!-- table row -->
              <div class="row">
                <div class="container bg-light">
                  <!-- tabble -->
                   <div class="row">
                     <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                         Open modal
                       </button>
                   </div>
                  <table class="table table-striped table-bordered">
                    <?php if(isset($message)){ ?>
                                   <div data-dismiss="alert" class ="alert alert-<?php echo  $class; ?>">
                                      <button type="button" class="close">&times;</button>
                                    <center> <?php echo   $msg; ?></center>  </div> 
                                     <?php } ?>

                    <thead>
                      <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price (#)</th>
                        <th>Total Price</th>
                        <th>Image</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                      $get_pro= mysqli_query($dbc,"SELECT * FROM product");
                       $i=1;   foreach ($get_pro as $pro ): 
                       $total = $pro['quantity'] * $pro['price']      ?>
                      <tr class="pro_text text-bold">
                        <td><b><?php echo $i ?></b></td>
                        <td><b><?php echo $pro['p_name'] ?></b></td>
                        <td><b><?php echo $pro['quantity'] ?> </b> </td>
                        <td><b><?php echo '#'. $pro['price'] ?></b></td>
                        <td><b><?php echo '#'. $total ?></b></td>
                        <td> <img src="img/<?php echo $pro['image'] ?>"  height='60' width='60' > </td>
                        <td class="text-center"> 
                        <a href="product.php?delete=<?php echo $pro['p_id']; ?>" class="btn btn-danger"> Delete </a>
                        <a href="edit_product.php?edit=<?php echo  $pro['p_id'];?>" class="btn btn-success" >Edit </a>
                        </td>
                    
                      </tr>
                        <?php $i++; endforeach; ?>
                        <!-- End of foreach -->
                        
                    </tbody>
                  </table>

                </div>
              </div>

              <!-- end of table row -->
            </div>
             <!-- Ends of container in the page -->
            </div>


        </div>
    </div>

<!-- end of the body content -->
      <!-- Modal begin -->

      <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Product/Items</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
             <form class="form" method="POST" enctype="multipart/form-data">
        <div class="form-group">
       <label for="usr">Name:</label>
  <input type="text" class="form-control" name="name" id="usr">
</div>

<div class="form-group">
  <label for="pwd">Category</label>
  <select name="category" class="form-control" required>
    <option value="">Select Category</option>

    <?php   $cat =mysqli_query($dbc, "SELECT * FROM category"); 
      foreach($cat as $category) :
    ?>
    <option value="<?php echo $category['c_id'] ?>"> <?php echo $category['category'] ?> </option>
  <?php endforeach ?>
  </select>
   
</div>

<div class="form-group">
  <label >Brand</label>
  <select name="brand" class="form-control" required>
    <option value="">Select Brand</option>
    <?php   $brd =mysqli_query($dbc, "SELECT * FROM brands"); 
      foreach($brd as $brand) : ?>
       <option value="<?php echo $brand['b_id'] ?>"> <?php echo $brand['brand'] ?> </option>
  <?php endforeach ?>
  </select>
   </div>

 <div class="form-group">
       <label for="usr">Price</label>
  <input name="price" type="text" class="form-control" id="usr">
</div>

<div class="form-group">
  <label for="usr">Image</label>
  <input name="img" type="file" class="form-control"  required >
</div>

<div class="form-group">
  <label for="pwd">Quantity</label>
  <input name="quantity" type="number" class="form-control" required>
</div>
<div class="form-group">
  <label for="pwd">keyword</label>
  <input name="keyword" type="text" class="form-control" required>
</div>
 
<!--  <div class="form-group">
  <label >Product Keyword</label>
  <input name="keyword" type="text" class="form-control"  placeholder="E.G: Charger, Andriod, Infinix" required > 
</div> -->

 <div class="form-group">
  <label >Product Description </label>
  <input name="description" type="text" class="form-control"  placeholder="Andriod Charger, with two usb, 6a" required>
</div>

        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> 

      </form>
  
      </div>
    </div>
  </div>

  <!-- end of modal -->
<?php include ('inc/script.php'); ?>
</body>


</html>