<?php

$number_account=$_POST["num"];
$servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "ecommercs";
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$msg='';
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

}
$sql = "SELECT * FROM `account` where `account_number`='$number_account'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    
    
    echo "OK ";
}
else{
    echo "Wornging";
}   

?>