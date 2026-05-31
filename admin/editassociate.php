<?php
require('../config/database.php');
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
}
$query = "SELECT * FROM associate_registrations";
$run = mysqli_query($conn, $query);
$user_data = mysqli_fetch_array($run);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ujjwalatai Jangale</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="../assets/css/style.css" media="all">
<link rel="stylesheet" href="dist/css/adminstyle.css">
  <link rel="apple-touch-icon-precomposed" href="../assets/documents/logo.jpg">

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark side-bar-bg">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../include/logout.php">
            Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <?php include 'menusidebar.php'?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper ">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <center>
                <h1 class="m-0">Admin Setting</h1>
              </center>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
     
<div class="card custom-card col-lg-12">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-user-edit mr-2"></i>
            Update Member
        </h3>
    </div>

    <?php
    if (isset($_POST['editid'])) {

        $id = $_POST['editid'];

        $query = "SELECT * FROM associate_registrations WHERE id='$id'";
        $run = mysqli_query($conn, $query);

        while ($data = mysqli_fetch_array($run)) {
    ?>

    <form action="../includes/admin.php" method="POST">

        <div class="card-body">

            <input type="hidden" name="editid" value="<?= $data['id'] ?>">

            <div class="row">

                

                <div class="col-md-6 mb-3">
                    <label>Member Name</label>
                    <input type="text"
                           class="form-control"
                           name="member_name"
                           value="<?= $data['member_name'] ?>"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email Address</label>
                    <input type="email"
                           class="form-control"
                           name="email"
                           value="<?= $data['email'] ?>"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Contact Number</label>
                    <input type="text"
                           class="form-control"
                           name="contact_no"
                           value="<?= $data['contact_no'] ?>"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Amount</label>
                    <input type="number"
                           class="form-control"
                           name="amount"
                           value="<?= $data['amount'] ?>"
                           required>
                </div>

                <div class="col-md-12 mb-3">
                    <label>Address</label>
                    <textarea class="form-control"
                              rows="3"
                              name="address"><?= $data['address'] ?></textarea>
                </div>

               

                

                <div class="col-md-12 mb-3">
                    <label>Transaction ID</label>
                    <input type="text"
                           class="form-control"
                           name="transaction_id"
                           value="<?= $data['transaction_id'] ?>">
                </div>

            </div>

        </div>

        <div class="card-footer text-right">

           

            <button type="submit"
                    name="update-associate"
                    class="btn btn-save">
                <i class="fas fa-save"></i> Save Changes
            </button>

        </div>

    </form>

    <?php
        }
    }
    ?>

</div>

<style>
.custom-card{
    border:0;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,0.10);
}

.custom-card .card-header{
    background:#0C2B4B;
    color:#fff;
    padding:15px 20px;
}

.custom-card .card-title{
    margin:0;
    font-size:20px;
    font-weight:600;
}

.custom-card .card-body{
    background:#fff;
    padding:30px;
}

.custom-card label{
    color:#0C2B4B;
    font-weight:600;
}

.custom-card .form-control{
    border:1px solid #dcdcdc;
    border-radius:10px;
    height:45px;
}

.custom-card textarea.form-control{
    height:auto;
}

.custom-card .form-control:focus{
    border-color:#D4AF37;
    box-shadow:0 0 8px rgba(212,175,55,0.35);
}

.card-footer{
    background:#f8f9fa;
    border-top:1px solid #eee;
    padding:20px;
}

.btn-save{
    background:#D4AF37;
    color:#fff;
    border:none;
    border-radius:8px;
    padding:10px 25px;
    font-weight:600;
}

.btn-save:hover{
    background:#be9b2f;
    color:#fff;
}

.btn-cancel{
    background:#0C2B4B;
    color:#fff;
    border:none;
    border-radius:8px;
    padding:10px 25px;
    font-weight:600;
}

.btn-cancel:hover{
    background:#081f36;
    color:#fff;
}
</style>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <center> <strong>Copyright &copy; 2020-2021 <a href="https://adminlte.io">D-Empire.llp</a>.</strong>
        All rights reserved.</center>

    </footer>
  </div>
  <!-- ./wrapper -->

  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard3.js"></script>
  <script>
    $(function() {
      // Summernote
      $('.textarea').summernote()
    })
  </script>
  <script src="plugins/summernote/summernote-bs4.min.js"></script>


</body>

</html>