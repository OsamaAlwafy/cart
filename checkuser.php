<?php


$name=$_POST["name"];
 $email=$_POST["email"];
 $phone=$_POST["phone"];
 $password_user=0;
 $streem=$_POST["Street"];
 $city=$_POST["city"];
 $Country=$_POST["country"];
 $gender=$_POST["gender"];



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
  

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
?>