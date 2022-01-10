<?php 
include ('inc/db.php');
$admin=1;
  // Insert brand code
$msg="";
$class= '';

 // get category
  function getcate(){
  $sel_cate=mysqli_query($dbc, "SELECT * FROM category");
  $get_cate=mysqli_fetch_assoc($sel_cate);
   while ($get_cate = $category) {
    echo '<>';
   }
}

 // get brands
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





    
 ?>
