


<?php
session_start();


$password_user="";
$number="";

if(isset($_POST["submit"]))
{


$number=rand(10000,10000000);
$password_user=rand(10000,100000000);
$mony=$_POST["quntity"];
$user_id=$_SESSION["user_id"];
$date=date("l jS \of F Y h:i:s A");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercs";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$msg='';
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO `account` (`account_number`,`amount`,`date_open` ,`user_id`,`pass`) 
               VALUES ('$number','$mony','$date','$user_id','$password_user')";
  
        // Execute query
        setcookie("user",$user_id,time() + (86400 * 30),"/");
        $value=mysqli_query($conn, $sql);
        
        if(!$value)
        echo("Error description: " . mysqli_error($conn));

        
echo"osama";

}

include 'page_section/header.php';
?>


  
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                    <div class="cont d-flex ">
                        <h3>Register Today</h3>
                        <div >
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" style="color:white" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
  <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
</svg>
                        </div>
                        </div>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" action="#" method="POST" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="quntity" placeholder="How Many $ " >
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>
                            <div class="form-button mt-3">
                                <input id="submit" type="submit" value="Register" name="submit" class="btn btn-primary">
                            </div>

                        </div>    
                        </div>    
                        </div>    
                        </div>    
                        </div>

                    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Information Account </h5>
    <h6 class="card-subtitle mb-2 text-muted">Number Account</h6>
    <p class="card-text"><?php echo $number; ?></p>
    <h6 class="card-subtitle mb-2 text-muted">Password Account</h6>
    <p class="card-text"><?php echo $password_user;  ?></p>
    <a href="checkout.php" class="card-link btn btn-primary">Checkout</a>
    
  </div>
</div>        
  
  
  
  
  
 




