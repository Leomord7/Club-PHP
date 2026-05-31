<?php
require('../config/database.php');
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
}
$query = "SELECT * FROM home_about,home_info,home_gallery,admin";
$run = mysqli_query($db, $query);
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
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
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

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../images/<?= $user_data['admin_profile'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../images/<?= $user_data['admin_profile'] ?>" class="img-circle" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $user_data['fullname'] ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="index.php?aboutsetting=true" class="nav-link ">
                <i class="nav-icon fa fa-question-circle"></i>
                <p>
                  About

                </p>
              </a>

            </li>

            <li class="nav-item menu-open">
              <a href="index.php?infosetting=true" class="nav-link ">
                <i class="nav-icon fa fa-briefcase"></i>
                <p>
                  परिचय

                </p>
              </a>

            </li>
            <li class="nav-item menu-open">
              <a href="index.php?eventsetting=true" class="nav-link ">
                <i class="nav-icon fa fa-camera"></i>
                <p>
                  Events
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?eventsetting=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      Add event

                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="index.php?viewevent=true" class="nav-link ">
                    <i class="nav-icon  fa fa-list-ul"></i>
                    <p>
                      View Event

                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-open">
              <a href="index.php?newssetting=true" class="nav-link ">
                <i class="nav-icon fa fa-newspaper"></i>
                <p>
                  News
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?newssetting=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      Add News

                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="index.php?viewnews=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      View News

                    </p>
                  </a>
                </li>
              </ul>

            </li>

            <li class="nav-item menu-open">
              <a href="index.php?gallerysetting=true" class="nav-link ">
                <i class="nav-icon fa fa-file-image"></i>
                <p>
                  Gallery
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?gallerysetting=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      Add Gallery

                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="index.php?viewgallery=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      View Gallery

                    </p>
                  </a>
                </li>
              </ul>

            </li>
            <li class="nav-item menu-open">
              <a href="index.php?basetting=true" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Work
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?basetting=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      Add work

                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="index.php?viewba=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      View work

                    </p>
                  </a>
                </li>
            </li>
          </ul>
          <li class="nav-item">
            <a href="index.php?contactsetting=true" class="nav-link ">
              <i class="nav-icon fa fa-phone"></i>
              <p>
                Contact

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?accountsetting=true" class="nav-link ">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Account

              </p>
            </a>
          </li>




          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

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
      <div class="card card-primary col-lg-12">
       <div class="card-header">
         <h3 class="card-title">Update News</h3>
       </div>

       <?php
        if (isset($_POST['editnews'])) {
          print_r($_FILES);

          print_r($_POST);
          $id = $_POST['editid'];
          $query = "SELECT * from home_info  where id = $id";
          $run = mysqli_query($db, $query);
          while ($data = mysqli_fetch_array($run)) {

        ?>


           <form action="../include/admin.php" method="POST" enctype="multipart/form-data">
             <div class="card-body">
               <input type="hidden" name="editid" value="<?= $data['id'] ?>">
               <div class="form-group">
                 <label for="exampleInputEmail1">Title</label>
                 <input type="text" name="titleEdit" value="<?= $data['title'] ?>" class="form-control">
               </div>
               <div class="form-group">
                 <label for="exampleInputEmail1">Description</label>

                 <textarea cols="50" class="textarea" name="descEdit"><?= $data['descr'] ?></textarea>
               </div>
             </div>
             <div class="card-footer">
               <a href="index.php" class="btn btn-danger">Cancel</a>
               <button type="submit" name="update-info" class="btn btn-primary">Save Changes</button>

             </div>
           </form>



       <?php
          }
        }






        //     $project_image = time().$_FILES['npic']['name'];

        //   move_uploaded_file($_FILES['npic']['tmp_name'],"../assets/img/$project_image");

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