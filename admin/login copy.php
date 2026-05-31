<?php
require('../config/database.php');
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "SELECT * FROM admin WHERE email='$email' && password='$password'";
  $run = mysqli_query($db,$query);
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

<style>
  body {
    background-color: oranged;
    font-family: roboto;
  }

  #left {
    background-size: cover;
    background-image: url(logo.png);
    height: 600px;
  }

  #main {
    /*width: 100%;*/
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    /*
    display: flex;
    justify-content: center;*/
    flex-direction: column;
  }

  input[type="text"] {
    background: none;
    /* border: none;*/
    outline: none;
    color: white;
    outline: none !important;
    box-shadow: none !important;
    text-align: center;
    font-size: 19px;
    height: 53px;
  }

  input.middle:focus {
    outline-width: 0;
  }

  input[type="text"]::placeholder {
    /* Firefox, Chrome, Opera */
    text-align: center;
    font-size: 19px;
    color: #A6A6A6;
  }

  #inp {
    background: none;
    border: 3px solid #F80070;
    border-radius: 16px;
    color: white;
    letter-spacing: 3px;
  }

  #butt {
    border-radius: 16px;
    border: 3px solid #F80070;
    margin-top: 29px;
    width: 105%;
    background: none;
    color: white;
    /*  border-radius: 40px;*/
    font-size: 19px;
    margin-left: -15px;
    letter-spacing: 3px;
  }

  #right {
    background-size: cover;
    background-image: url(backgroudotp.jpg);
    height: 600px;
  }

  #b1 {
    letter-spacing: 3px;
    display: flex;
    /* margin-left: -10px; */
    border: 3px solid #F80070;
    border-radius: 16px;
    justify-content: center;
  }

  @media only screen and (max-width: 768px) {
    #left {
      display: none;
    }

    #main {
      width: 82%;
      position: absolute;
      top: 50%;
      left: 52%;
      transform: translate(-50%, -50%);
      flex-direction: column;
    }

    #myrow {
      flex-wrap: nowrap;
    }

    #inpdiv {
      width: 480%;
    }

    body {
      background-image: url(backgroudotp.jpg);
    }
  }
</style>
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
</head>

<body>
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-6">
        <img src="../assets/documents/bjplogo2.png" class="img-fluid" alt="Avatar">
      </div>

      <div class="col-lg-6" style="background:orange" ;>
        <div class="login-box">
          <div class="login-logo">
            <a href="index.php"><b>BJP</b> </a>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Admin Panel</p>
              <form method="post" style="margin-top : 30%;">
                <div class="input-group mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>

          

      <div class="row">

        <!-- /.col -->
        <div class="col-4">
          <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>

    </div>
  </div>
  </div>
</div>
</div>
</div>
</div>
</form>

</body>


<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>

</html>