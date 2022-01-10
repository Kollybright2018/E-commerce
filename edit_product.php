<?php 
include ('inc/db.php');
$admin=1;
$msg ='';
$class = '';
$id =$_GET['edit'];
if (isset($_POST['update'])) {
   $name = mysqli_real_escape_string($dbc, $_POST['name']);
   $price = mysqli_real_escape_string($dbc, $_POST['price']);
   $c_id = mysqli_real_escape_string($dbc, $_POST['category']);
   $b_id = mysqli_real_escape_string($dbc, $_POST['brand']);
   $keyword = mysqli_real_escape_string($dbc, $_POST['keyword']);
   $quantity = mysqli_real_escape_string($dbc, $_POST['quantity']);
   $description = mysqli_real_escape_string($dbc, $_POST['category']);
   $brand = mysqli_real_escape_string($dbc, $_POST['brand']);
   // get image
   $img = $_FILES["img"]["name"];
   $tempname =$_FILES["img"]["tmp_name"];
   $folder= "img/".$img;
   move_uploaded_file($tempname, $folder);
     $get_pro = mysqli_query($dbc, "SELECT * FROM product WHERE p_name = '$name' AND c_id = '$c_id' ");
   $count_pro = mysqli_num_rows($get_pro);

      if ($count_pro == 0) {
  
      $update = mysqli_query($dbc, "UPDATE product SET p_name= '$name', b_id='$b_id', c_id='$c_id', price ='$price',quantity ='$quantity', keyword='$keyword', image ='$img', description ='$description', date_update=current_timestamp() WHERE  product.p_id='$id' "); 
       echo "<script>alert('Product Has been Updated Successfully!')</script>";
    echo "<script>window.open('product.php','_self')</script>";
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
   $msg = "product Deleted Successfully";
   $class ="danger";
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
    <div class="col-md-3"></div>

            <!-- center of the page  -->
            <div class="col-md-6 "  >
             <h1 class="pt-4 text-success text-center">God's Blessing Admin Area</h1>
          
              <div class="row">
                <div class="container bg-light">
                    <form class="form" method="POST" enctype="multipart/form-data">
                      <?php 

                      $fetech_pro =mysqli_query($dbc, "SELECT * FROM product 
                                                        INNER JOIN brands ON brands.b_id = product.b_id
                                                         INNER JOIN category ON category.c_id = product.c_id 
                                                        WHERE product.p_id = '$id' ");
                      foreach ($fetech_pro as $pro) :
                       ?>
        <div class="form-group">
       <label for="usr">Name:</label>
  <input type="text" class="form-control form-control-rounded" name="name" value="<?php echo $pro['p_name'] ?>">
</div>

<div class="form-group">
  <label for="pwd">Category</label>
  <select name="category" class="form-control" required>
    <option value="<?php echo $pro['c_id'] ?>"><?php echo $pro['category'] ?></option>

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
  <option value="<?php echo $pro['b_id'] ?>"><?php echo $pro['brand'] ?></option>
    <?php   $brd =mysqli_query($dbc, "SELECT * FROM brands"); 
      foreach($brd as $brand) : ?>
       <option value="<?php echo $brand['b_id'] ?>"> <?php echo $brand['brand'] ?> </option>
  <?php endforeach ?>
  </select>
   </div>

 <div class="form-group">
       <label for="usr">Price</label>
  <input name="price" type="text" class="form-control" id="usr" value="<?php echo $pro['price'] ?>">
</div>

<div class="form-group">
  <label for="usr">Image</label>
  <input name="img" type="file" class="form-control" required >
    <img src="img/<?php echo $pro['image'] ?>"  height='60' width='60' >
</div>

<div class="form-group">
  <label for="pwd">Quantity</label>
  <input name="quantity" type="number" class="form-control" value="<?php echo $pro['quantity'] ?>" required>
</div>
<div class="form-group">
  <label for="pwd">keyword</label>
  <input name="keyword" type="text" class="form-control" value="<?php echo $pro['keyword'] ?>" required>
</div>

 <div class="form-group">
  <label >Product Description </label>
  <input name="description" type="text" class="form-control" value="<?php echo $pro['description'] ?>" placeholder="Andriod Charger, with two usb, 6a" required>
</div>
        <button type="submit" class="btn btn-primary" name="update">Submit</button>
      <?php endforeach ?>
             </form>
                </div>
                <!-- middle coloum -->
              </div>

              <!-- end of table row -->
            </div>
            <div class="col-md-3"></div>
             <!-- Ends of container in the page -->
            </div>
        </div>
<!-- end of the body content -->
      
<?php include ('inc/script.php'); ?>
</body>


</html>