<?php
require('../config/database.php');
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
}
$query = "SELECT * FROM gallery";
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
      <style>
    .custom-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .custom-card .card-header {
        background: #0C2B4B;
        color: #fff;
        border-bottom: 4px solid #D4AF37;
        padding: 18px 25px;
    }

    .custom-card .card-title {
        margin: 0;
        font-size: 22px;
        font-weight: 600;
    }

    .gallery-preview {
        text-align: center;
        margin-bottom: 25px;
    }

    .gallery-preview img {
        max-height: 250px;
        border-radius: 12px;
        border: 4px solid #D4AF37;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }

    .upload-box {
        border: 2px dashed #D4AF37;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        background: #f8f9fa;
        transition: 0.3s;
    }

    .upload-box:hover {
        background: #fffdf5;
        border-color: #0C2B4B;
    }

    .upload-box i {
        font-size: 55px;
        color: #D4AF37;
        margin-bottom: 15px;
    }

    .custom-file-input {
        border: 2px solid #D4AF37;
        border-radius: 10px;
        padding: 10px;
    }

    .btn-cancel {
        background: #dc3545;
        color: #fff;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-cancel:hover {
        background: #bb2d3b;
        color: #fff;
    }

    .btn-save {
        background: #0C2B4B;
        color: #fff;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-save:hover {
        background: #D4AF37;
        color: #0C2B4B;
    }

    .card-footer-custom {
        background: #f8f9fa;
        border-top: 1px solid #eee;
        padding: 20px;
    }
</style>

<div class="card custom-card col-lg-12">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-images mr-2"></i>
            Update Gallery Image
        </h3>
    </div>

    <?php
    if (isset($_POST['editnews'])) {

        $id = $_POST['editid'];
        $query = "SELECT * from gallery where id = $id";
        $run = mysqli_query($conn, $query);

        while ($data = mysqli_fetch_array($run)) {
    ?>

    <form action="../includes/admin.php" method="POST" enctype="multipart/form-data">

        <div class="card-body">

            <input type="hidden" name="editid" value="<?= $data['id'] ?>">

            <div class="gallery-preview">

                <img src="../img/gallery/<?= $data['image'] ?>"
                     class="img-fluid">

                <h5 class="mt-3" style="color:#0C2B4B;">
                    Current Gallery Image
                </h5>

            </div>

            <div class="upload-box">

                <i class="fas fa-cloud-upload-alt"></i>

                <h5 style="color:#0C2B4B;">
                    Upload New Image
                </h5>

                <p class="text-muted">
                    Select a new image to update the gallery.
                </p>

                <input type="file"
                       name="npicEdit"
                       class="form-control ">

            </div>

        </div>

        <div class="card-footer card-footer-custom text-right">

            <a href="index.php" class="btn btn-cancel">
                <i class="fas fa-times"></i> Cancel
            </a>

            <button type="submit"
                    name="update-gallery"
                    class="btn btn-save">

                <i class="fas fa-save"></i>
                Save Changes

            </button>

        </div>

    </form>

    <?php
        }
    }
    ?>

</div>

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