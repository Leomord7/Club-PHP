<?php
require('../config/database.php');
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "SELECT * FROM admin WHERE email='$email' && password='$password'";
  $run = mysqli_query($conn,$query);
  $data = mysqli_fetch_array($run);
  if(count($data)>0){
    $_SESSION['isUserLoggedIn']=true;
    $_SESSION['emailId'] = $_POST['email'];
    echo "<script>window.location.href = 'index.php';</script>";
  }else{
    echo "<script>alert('Incorrect email id or password !')</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/adminstyle.css">
</head>
<body >


<div class="login-container">

    <!-- Left Branding Section -->
    <div class="login-left">
        <img src="../img/about-1.jpeg" alt="Logo" class="logo">

        

        <h4>
            Welcome to the Admin Management System
</h4>
    </div>

    <!-- Right Login Section -->
    <div class="login-right">

        <div class="login-box">

            <h2>Sign In</h2>

            <form method="post">

                <div class="form-group">
                    <label>User Type</label>

                    <select name="user_type" class="form-control" required>
                        <option value="">Select User Type</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Email Address</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Enter Email"
                           required>
                </div>

                <div class="form-group">
                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Enter Password"
                           required>
                </div>

                <button type="submit"
                        name="login"
                        class="login-btn">
                    Login
                </button>

            </form>

        </div>

    </div>

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
