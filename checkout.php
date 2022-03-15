<?php session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercs";
$msg="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['finsh_shoping']))
{

  
if (!isset($_COOKIE['user'])) {
 header("Location:sign-up.php");
  exit();
  // echo" ".$_COOKIE['user'];
  
  


}
else{
  $totalBuy=$_POST["amount"];
  $iduser=$_COOKIE['user'];
  echo $iduser;
  $sql = "SELECT * FROM `account` where `user_id`='$iduser'";
$result = $conn->query($sql);
var_dump($result);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) { 
  $amount =$row["amount"];
  if($totalBuy>$amount)
  {
    $msg="There is not enough credit for the purchase";
  }
  else{
    $albqi=$amount-$totalBuy;
    $sql = "UPDATE `account` SET `amount`='$albqi' WHERE `user_id`='$iduser'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
   // header("Location:steper.php");
    exit();
  }
}

  
  

  
}
}
}

 include 'page_section/header.php'; 

 



?>




 <div class="container-fuild">
     <div class="row justify-content-around">


     

<div class=" col-md-7 col-12 allproducts">






     <!--start product one -->

     <?php
   // extract the id of products
  //  print_r($_SESSION["id"]);
   
  $key=[];
  $cout=[];
   foreach(array_count_values($_SESSION["id"]) as $x=>$x_value)
   {
       array_push($key,$x);
        array_push($cout,$x_value);
   
   }


// print_r($key);
// print_r($cout);
   $ids = join("','",$key);   
//    $sql = "SELECT * FROM galleries WHERE id IN ('$ids')";
   
         
$sql = "SELECT * FROM products where id IN ('$ids')";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   
  ?>
     
     <div class="col-12 card p-2 ps-1 mb-3 shadow p-3 mb-5 bg-body rounded" style="">
  <div class="row g-0"> <!--sart row one -->
    <div class="col-md-4">
      <img src=<?php echo "images/".$row["image"] ?> width="100" height="200" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row["name"] ;?></h5>
        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
      </div>
    </div>
   <div class="container-price col-md-1 price-pro" >
   <?php echo $row["price"] ?>
   </div>
    
   
    
  </div> <!--end row one -->

  <!--start  row 2 -->

<div class="row">
    <div class="decription col-8">
    <p class="card-text"> <?php echo $row["desc"] ;?> </p>

    </div>
   <div class="quntity col-4">
      <div class="progrss">
      <label for="customRange1" class="form-label">Quntity</label>
        <?php  $index =array_search($row["id"],$key);
                $qnt=$cout[$index];    
        ?>
        <input type="range" min="0" max="100" oninput="showVal(this)" step="1" data-id="<?php echo "id".$row["id"] ; ?>" value=<?php echo $qnt ; ?> class="form-range" id="customRange1">
      </div>
      <div class="show-quenty" >
      <input class="form-control text-align-center qnt-pro"  id="<?php echo "id".$row["id"] ; ?>" value=<?php echo $qnt ; ?> type="text" placeholder="1" aria-label="default input example">
      </div>
      
   </div>

</div>
  <!--end  row 2 -->
  </div> <!--end product one -->

 <?php }} ?>
  

       


  </div>

  <div class="card col-12 col-md-4  shadow p-3 mb-5 bg-body rounded mt-2">
  <div class="card-body">
      <div class="price-total position-relative">
      <p class="card-text">summation</p>
      <p class="card-text position-absolute top-0 end-0 " id="sum-all" style="color:red">0</p>

      </div>

      <div class="price-total position-relative">
      <p class="card-text">Shipping costs</p>
      <p class="card-text position-absolute top-0 end-0 " style="color:green">free</p>

      </div>
      
      <div class="price-total position-relative">
      <p class="card-text">Total costs with tax</p>
      <p class="card-text position-absolute top-0 end-0 "style="color:red" id="total-cost">95$</p>

      </div>

   
    <p class="card-text">By clicking Finish Shopping, you agree to 
        the Terms and Conditions Privacy Policy</p>
     <form action="#" method="POST"> 
       <input type="hidden" name="amount" value="" id="total">
    <input type="Submit" value="finsh_shoping" name="finsh_shoping">
    </form>
    <div class="alert" ><h4 style="color:red;"><?php echo $msg ; ?><h4></div>  
  </div>
</div>

</div>
 </div>
<script src="js/checkout.js"></script>
</body>
</html>


