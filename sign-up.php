<?php
session_start();

if(isset($_POST["submit"]))
{
 $name=$_POST["name"];
 $email=$_POST["email"];
 $phone=$_POST["phone"];
 $password_user=$_POST["password"];
 $streem=$_POST["streem"];
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
$sql = "INSERT INTO `users` (`name`,`email`,`street` ,`city`,`phone`,`type`,`country`,`password`,`gender`) 
               VALUES ('$name','$email','$streem','$city','$phone','S','$Country','$password_user','$gender')";
  
        // Execute query
        $value=mysqli_query($conn, $sql);
        echo" value".$value;
        if(!$value)
        echo("Error description: " . mysqli_error($conn));

       



else{
    $user_id=$conn->insert_id;      
       $_SESSION["user_id"]= $user_id;
 header("Location:create-account.php");
 exit();
 }
}





include 'page_section/header.php';

?>

  
      
         

    
      <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register Today</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" action="#" method="POST" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="name" placeholder="Full Name" >
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address" >
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="phone" placeholder="Phone number" >
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                           <!-- <div class="col-md-12">
                                <select class="form-select mt-3" required>
                                      <option selected disabled value="">Position</option>
                                      <option value="jweb">Junior Web Developer</option>
                                      <option value="sweb">Senior Web Developer</option>
                                      <option value="pmanager">Project Manager</option>
                               </select>
                                <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div>
                           </div> -->


                           <div class="col-md-12">
                               <input class="form-control" type="password" name="password" placeholder="Password" >
                               <div class="valid-feedback">Password field is valid!</div>
                               <div class="invalid-feedback">Password field cannot be blank!</div>
                           </div>

                           <div class="col-md-12">
                               <input class="form-control" type="text" name="streem" placeholder="Streem" >
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="city" placeholder="city" >
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <select class="form-select mt-3" name="country" required>
                                      <option selected disabled value="">Country</option>
                                      <option value="Sodia">Sodia</option>
                                      <option value="Yemen">Yemen</option>
                                      <option value="Oman">Oman</option>
                               </select>
                                <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div>
                           </div>

                            
                           <div class="col-md-12 mt-3">
                            <label class="mb-3 mr-1" for="gender">Gender: </label>

                            <input type="radio" class="btn-check" name="gender" value="male" id="male" autocomplete="off" >
                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                            <input type="radio" class="btn-check" name="gender" value="female" id="female" autocomplete="off" >
                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                            <input type="radio" class="btn-check" name="gender" id="secret" autocomplete="off" >
                            <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>
                               <div class="valid-feedback mv-up">You selected a gender!</div>
                                <div class="invalid-feedback mv-up">Please select a gender!</div>
                            </div>

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" >
                          <label class="form-check-label">I confirm that all data are correct</label>
                         <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div>
                  

                            <div class="form-button mt-3">
                                <input id="submit" type="submit" value="Register" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    





      </div> <!--end model form-->



      <!-- Modal footer -->
      


</body>
</html>
