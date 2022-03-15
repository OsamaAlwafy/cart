<?php  session_start(); 
//$initails=0;
//$_SESSION["basket"]=$initails;
?>

<?php
// handle the catigory choose
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//  echo "post id=".$_POST["id_cat"];
  // print_r($_POST);
  $_SESSION["basket"]=1+ $_SESSION["basket"];
// echo $_SESSION["basket"];
//  echo "id elements :". $_POST["id_pro"];
  //print_r($_POST);
//   echo "here";
//$id= rand(10,100000).$_POST["id_pro"];;
  
  
  $_SESSION["id"][]=$_POST["id_pro"];

  print_r(array_keys((array_count_values($_SESSION["id"]))));

  //header("Location:product.php");
  //exit;

}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




 include 'page_section/header.php'; 

  
     ?>

<div class="container-fluid">
  <div class="row">
  
  <?php
         
         $sql = "SELECT * FROM products where catigory=".$_SESSION["id_catigory"];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   
  ?>


  <div class="card  ms-3 mt-4" style="width: 18rem;">
  <img src=<?php echo "images/".$row["image"]; ?> height="300" width="200"  class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row["name"]; ?></h5>
    <p class="card-text"> <?php echo $row["desc"] ;?> </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">price <?php  echo $row["price"];  ?> </li>
    <li class="list-group-item">discont 0</li>
   
  </ul>
  <div class="card-body">
     <form id=<?php echo $row["name"]; ?> action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
          <input type="hidden" name="id_pro" value=<?php echo $row["id"]; ?> >
          <input  id=<?php echo "basket".$row["name"]; ?>  type="hidden" name="basket" value=<?php echo $_SESSION["basket"] ?> >
          <div class="row">
          <a href="#" class=" d-inline-block col-3" >
          <svg class="m-2 d-inline-block" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
         </svg>
          </a>

          <a class=" d-inline-block col-3" href="#" >
          <svg class="m-2 d-inline-block" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
          <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
         </svg>
          </a>


          <a id="submit-anchor" href="#" class=" d-inline-block col-3" data-basket="<?php echo "basket".$row["name"]; ?>" data-class=<?php echo $row["name"]; ?>  onclick="getDate( this);" > 
          <svg class="m-2 d-inline-block" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          </a>
          </div>
     </form>
  </div>
</div><!--end the products -->
<?php }} ?>
  </div>

</div>
<script src="js/bootstrap.bundle.min.js"> </script>
<script>

//"document.getElementsByClassName('form1')[0].submit();" 
var basket=document.getElementById("cardqty");
var sub=document.getElementById("submit-anchor");
var baskets=sub.getAttribute("data-basket");
var bask=document.getElementById(baskets).value;
basket.innerText=bask; 
 
function getDate( element)
{
   var fomrSelect= element.getAttribute("data-class");
   console.log(fomrSelect);
    
//    var basket=document.getElementById("cardqty");
//    console.log(basket);

// //    var qty=parseInt(basket.innerText);
// //    console.log(qty);
// //    console.log( qty=qty+1);
// //    basket.innerText=qty;
// var baskets= element.getAttribute("data-basket");

//    var bask= document.getElementById(baskets).value;
//    console.log(bask);
//    basket.innerText=bask; 
   
   
   document.getElementById(fomrSelect).submit();
}
    </script>
</body>
</html>