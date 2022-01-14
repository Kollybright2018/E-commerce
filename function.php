<?php 
include ('inc/db.php');

$admin=1;
  // Insert brand code
$msg="";
$class= '';


// treat form input
function treat($data){
  $text = htmlspecialchars($data);
  $text = trim($text);
  $text = stripslashes($text);
  return $text ;
}

// get ip address
function getIp() {
  $ip = $_SERVER['REMOTE_ADDR'];

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }

  return $ip;
}

 // get category
  function getcate(){
    global $dbc;
  $sel_cate=mysqli_query($dbc, "SELECT * FROM category");

   while ($get_cat=mysqli_fetch_assoc($sel_cate)) {
     $c_id = $get_cat['c_id'] ;  
    $cat_name =  $get_cat['category'];
    echo "<li> <a href='index.php?c_id=$c_id' class=''>  $cat_name </li>";
    
   }
}


 // get brand for list
 function getbrd(){
  global $dbc;
$sel_brand=mysqli_query($dbc, "SELECT * FROM brands");


 while ($get_brand=mysqli_fetch_assoc($sel_brand)) {
   $brand_name =  $get_brand['brand'];
   $b_id = $get_brand['b_id'];
  echo "<li> <a href='index.php?b_id=$b_id' class=''>  $brand_name </li>";
  
 }
}

 // get brands for table
  function getbrand(){
    global $dbc;
  $sel_brand=mysqli_query($dbc, "SELECT * FROM brands");
  // $get_brand=mysqli_fetch_assoc($sel_brand);
  $sn=0;
   while ($get_brand = mysqli_fetch_assoc($sel_brand)) {
     $sn++;
     $brand= $get_brand['brand'];
     $date= $get_brand ['date_added'];
    
    echo "                    <tr>
                              <th>$sn</th>
                              <th>$brand</th>
                              <th>$date</th>
                              <th>Edit</th>
                              <th>Delete</th>
                              </tr>
         ";
  
   }
}
// Add to cart
function cart(){
  global $dbc;
  $ip =getIp();
  if ($_GET['cart']) {
   $p_id = $_GET['cart'];
  $sel_cart = mysqli_query($dbc, "SELECT * FROM cart WHERE ip_addr ='$ip' AND p_id ='$p_id' ");
  if (mysqli_num_rows($sel_cart)>0) {
    echo " ";
  }else {
    $qty = 0;
    $insert = mysqli_query($dbc, "INSERT INTO cart (p_id, ip_addr, qty)
                                values('$p_id', '$ip', '$qty') ");
                           
  }
  }
 
}

// Count cart items 
function count_cart(){
  global $dbc ;
  if (isset ( $_GET['cart'])) {
    $p_id =$_GET['cart'];
    $ip = getIp(); //function to get ip address
    $sel_cart= mysqli_query($dbc, "SELECT * FROM cart WHERE ip_addr ='$ip' ");
    $count = mysqli_num_rows($sel_cart);
 
  }else {
    $p_id =$_GET['cart'];
    $ip = getIp(); //function to get ip address
    $sel_cart= mysqli_query($dbc, "SELECT * FROM cart WHERE ip_addr ='$ip' ");
    $count = mysqli_num_rows($sel_cart);
  
  }
  
}
    
 ?>
