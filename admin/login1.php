<?php
require('../config/database.php');
if(isset($_POST['login'])){
    $type=$_POST['user'];
    if($type=='company'){
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
 $query = "SELECT * FROM recruitment_company WHERE mobile='$mobile' || mobile1='$mobile' && password='$password'";
  $run = mysqli_query($db,$query);
  $data = mysqli_fetch_array($run);
  if(count($data) >0){
    $_SESSION['isUserLoggedIn']=true;
    $_SESSION['mobileId'] = $_POST['mobile'];
    $_SESSION['typeId']= $type;
    echo "
<script>window.location.href = 'index.php?admin=true';</script>";
  }
    }else if($type=='candidate'){
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
 $query = "SELECT * FROM recruitment_company WHERE mobile='$mobile' || mobile1='$mobile' && password='$password'";
  $run = mysqli_query($db,$query);
  $data = mysqli_fetch_array($run);
  if(count($data) >0){
    $_SESSION['isUserLoggedIn']=true;
    $_SESSION['mobileId'] = $_POST['mobile'];
    $_SESSION['typeId']= $type;
    echo "
<script>window.location.href = 'index.php?admin=true';</script>";
  }
    }else{
        $mobile = $_POST['mobile'];
  $password = $_POST['password'];
 $query = "SELECT * FROM referance WHERE mobile='$mobile' || mobile1='$mobile' && password='$password'";
  $run = mysqli_query($db,$query);
  $data = mysqli_fetch_array($run);
  if(count($data) >0){
    $_SESSION['isUserLoggedIn']=true;
    $_SESSION['mobileId'] = $_POST['mobile'];
    $_SESSION['typeId']= $type;
    echo "
<script>window.location.href = 'index.php?staff=true';</script>";
  }else{
    echo "
<script>alert('Incorrect mobile number or password !')</script>";
  }
    }
}
?>


<?php
/*
require('../config/database.php');
if(isset($_POST['login'])){
    $type=$_POST['user'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  print_r($mobile);
  print_r ($password);
 $query = "SELECT * FROM staff WHERE mobile='$mobile' && password='$password'";
  $run = mysqli_query($db,$query);
  $data = mysqli_fetch_array($run);
  if(count($data) >0){
    $_SESSION['isUserLoggedIn']=true;
    $_SESSION['mobileId'] = $_POST['mobile'];
    $_SESSION['typeId']= $type;
    echo "
<script>window.location.href = 'index.php?staff=true';</script>";
  }else{
    echo "
<script>alert('Incorrect mobile number or password !')</script>";
  }
}
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>ShouryaInfoComm</title>
    <meta content="ShouryaInfoComm" name="description">
    <meta content="ShouryaInfoComm" name="">

    <!-- Favicons -->
    <link href="../assets/img/g/logo.png" style="border-radius: 50px;" rel="icon">
    <link href="../assets/img/g/logo.png" style="border-radius: 50px;" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Template Main CSS File -->
    <link href="style.css" rel="stylesheet">

    <!-- multi -->
</head>

<body>


<style>


/* Style tab links */
.tablink {
  color:  white;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 10px 10px;
  font-size: 17px;
  width: auto;
      margin-bottom: 20px;
      font-weight:600;
      background:transparent;
}

.tablink:hover {
  box-shadow: 0px 8px 5px -3px rgb(0 0 0 / 50%);
}



/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 10px 20px;
  height: 100%;
}

#Admin {background-color: ;}
#Staff{background-color: ;}



width: 100%;
    display: block;
    border: none;
    outline: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    border-radius: 0px 21px 21px 0px;
}



</style>

        


    <div class="wrapper " style="background:#292929">
        
         <div class="row">
                <button class="tablink col-6 " onclick="openPage('Admin', this, '')" id="defaultOpen"> </button>
                <button class="tablink col-6 " onclick="openPage('Staff', this, '')" > </button>
            
        </div>

        <div class="logo">
            <img src="../logo.png" alt="">
        </div>

        <div class=" tabcontent" id="Admin">

            <div class="text-center text-white mt-4 name">
                Other Login
            </div>


            <form class="p-3 mt-3" action=" " method="post" >
                
               <div class="form-field d-flex align-items-center">
                         <span class="icofont-user"></span>
                   
                                <select name="user" class="form-control input-field"  required >
    								<option>Select User </option>
    								<option value="company">Company</option>
                                    <option value="candidate">Candidate</option>
                                     <option value="referal">Referal</option>
    							</select>
                </div>
                      

                <div class="form-field d-flex align-items-center">
                    <span class="icofont-phone"></span>
                    <input type="text" name="mobile" id="userName" placeholder="Mobile Number">
                </div>

                <div class="form-field d-flex align-items-center">
                    <span class="icofont-key"></span>
                    <input type="password" name="password" id="txtConfirmPassword" placeholder="Password">
                </div>

              
                 <label class="text-center">Show Password <input type="checkbox" onclick="myFunction()"/>
                

                <button class="btn mt-3 " type="submit" name="login" style="margin-right:5em">Login</button>
            </form>
            

        </div>



         <div class=" tabcontent" id="Staff">

            <div class="text-center mt-4 name">
                Staff Login
            </div>


            <form class="p-3 mt-3" action=" " method="post" >
                <div class="form-field d-flex align-items-center">
                    <span class="icofont-user"></span>
                    <input type="text" name="mobile" id="userName" placeholder="Mobile Number">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="icofont-key"></span>
                    <input type="password" name="password"  id="txtConfirmPassword" placeholder="Password">
                     <label >Show Password <input type="checkbox" onclick="myFunction()"/>
                </div>
                <button class="btn mt-3" type="submit" name="staff">Login</button>
            </form>
            <div class="text-center fs-6">
                <a href="#">Forget password?</a> or <a href="#">Sign up</a>
            </div>

        </div>

    </div>


    <script>


    function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


</script>


<script>
function myFunction() {
  var x = document.getElementById("txtConfirmPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


    <!-- Vendor JS Files -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="../assets/vendor/counterup/counterup.min.js"></script>
    <script src="../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>