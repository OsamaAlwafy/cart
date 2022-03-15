<?php 


 include 'page_section/header.php'; 

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "ecommercs";

if(isset($_POST["submit"]))
{
 $name=$_POST["name"];
 $email=$_POST["email"];
 $phone=$_POST["phone"];
 $password_user=0;
 $streem=$_POST["Street"];
 $city=$_POST["city"];
 $Country=$_POST["country"];
 $gender=$_POST["gender"];


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$msg='';
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO `users` (`name`,`email`,`street` ,`city`,`phone`,`type`,`country`,`password`,`gender`) 
               VALUES ('$name','$email','$streem','$city','$phone','R','$Country','$password_user','$gender')";
  
        // Execute query
        $value=mysqli_query($conn, $sql);
        echo" value".$value;
        if(!$value)
        echo("Error description: " . mysqli_error($conn));

}       

?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <form id="regForm" >
                <h1 id="register">Info Recieve</h1>
                <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> </div>
                <div class="tab">
                          <form>
                           <div class="col-md-12 mb-2">
                               <input class="form-control" id="number-account" type="text" name="number-account" placeholder="Number Account" >
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" di="password-account" type="text" name="password-account" placeholder="PassWord Account" >
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>

                            <div class="form-button mt-3">
                                <button id="save" class="btn btn-primary" onclick="checkAccount();"> Check </button>
                            </div>
                            <div class="msg" id="msg"></div>
                        </form>
                        

               </div>

                <div class="tab">
                    <form >
                    <p><input placeholder=" Name" id="name" oninput="this.className = ''" name="name"></p>
                    
                    <p><input placeholder="Email" id="email" oninput="this.className = ''" name="email"></p>
                    <p><input placeholder="Phone" id="email"  oninput="this.className = ''" name="phone"></p>
                    <p><input placeholder="Street Address" id="email" oninput="this.className = ''" name="Street"></p>
                    <p><input placeholder="City" id="email" oninput="this.className = ''" name="city"></p>
                    
                    <p><input placeholder="Country" id="email" oninput="this.className = ''" name="country"></p>
                    <div class="col-md-12 mt-3">
                            <label class="mb-3 mr-1" for="gender">Gender: </label>

                            <input type="radio" id="email" class="btn-check" name="gender" value="male" id="male" autocomplete="off" >
                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                            <input type="radio" class="btn-check" name="gender" value="female" id="female" autocomplete="off" >
                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                            <input type="radio" class="btn-check" name="gender" id="secret" autocomplete="off" >
                            <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>
                               <div class="valid-feedback mv-up">You selected a gender!</div>
                                <div class="invalid-feedback mv-up">Please select a gender!</div>
                            </div>

                            <div class="form-button mt-3">
                                <button id="submit"  name="submit" id="create" class="btn btn-primary"> create </button>
                            </div>

         
                </div>
            </form>
                <div class="tab">
                    <p><input placeholder="Credit Card #" oninput="this.className = ''" name="email"></p>
                    <p>Exp Month <select id="month">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select></p>
                    <p>Exp Year <select id="year">
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select></p>
                    <p><input placeholder="CVV" oninput="this.className = ''" name="phone"></p>
                </div>
                <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                    <h3>Thanks for your Donation!</h3> <span>Your donation has been entered! We will contact you shortly!</span>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
                </div>
            </form>
        </div>
    </div>
</div>






<!-- 
<script >
    // function checkAccount(){
    //   var  numberAccount=document.getElementById("number-account").value;
    //   if(window.XMLHttpRequest)
    //   alert(numberAccount);
   
    //    var  passAccount=document.getElementById("password-account").value;
    // //    var param="number="+numberAccount.value+"&"+"pass="+passAccount;
    //    var xmlhttp = new XMLHttpRequest();
    // xmlhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //     alert("DGdffg");
    //   }
    //   else{
    //       alert("eerrpr");
    //   }
    // };
    // xmlhttp.open("GET", "check.php?num=" + numberAccount, true);
    // // http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // xmlhttp.send();

    // }
</script> -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/steper.js"></script>
<script>

jQuery("#save").click(function () {


  
    jQuery.ajax({
      type: "POST",
      url: "check.php",
     
      
      data: "num=" +$('#number-account').val(),
      success: function (response) {
    $("#msg").text(response);
       
        alert("success"+response);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
    });
  }
);


jQuery("#create").click(function () {
   
  jQuery.ajax({
    type: "POST",
    url: "checkuser.php",
   
    
    data: {"name":$('#number-account').val(),
           "email":$('#email').val(),
           "phone":$('#phone').val(),
           "Street":$('#Street').val(),
           "city":$('#city').val(),
           "country":$('#country').val(),
           
           "gender":$('#gender').val(),
          },
    success: function (response) {
//   $("#msg").text(response);
alert(response);
     
      alert("success"+response);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status);
      alert(thrownError);
    }
  });
}
);



</script>



</body>
</html>
