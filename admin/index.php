<?php
require('../config/database.php');
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
}
$query = "SELECT * FROM admin,about_us,settings";
$run = mysqli_query($conn, $query);
$user_data = mysqli_fetch_array($run);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>D empire llp</title>

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
    <nav class="main-header navbar navbar-expand side-bar-bg navbar-dark">
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
          <a class="nav-link" href="../includes/logout.php">
            Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   <?php include 'menusidebar.php' ?>

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
          <div class="row">
<?php
$memberCount = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM membership_registrations")
);

$associateCount = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM associate_registrations")
);


$result = mysqli_query(
    $conn,
    "SELECT visitor_count FROM website_visitors WHERE id = 1"
);

$data = mysqli_fetch_assoc($result);

 

?>
<style>
.dashboard-box{
    background: linear-gradient(135deg,#0C2B4B,#123f6d);
    color:#fff;
    border-radius:15px;
    padding:10px;
    box-shadow:0 5px 20px rgba(0,0,0,0.15);
    overflow:hidden;
    transition:0.3s;
}

.dashboard-box:hover{
    transform:translateY(-5px);
}

.dashboard-box .inner h3{
    font-size:38px;
    font-weight:700;
    color:#D4AF37;
}

.dashboard-box .inner p{
    font-size:16px;
    margin-bottom:0;
}

.dashboard-box .icon{
    position:absolute;
    right:15px;
    top:10px;
    font-size:60px;
    color:rgba(212,175,55,0.25);
}

.small-box{
    position:relative;
    min-height:150px;
}
</style>
    <!-- Member Registration -->
    <div class="col-lg-4 col-md-6 col-12">
        <div class="small-box dashboard-box">
            <div class="inner">
                <h3><?= $memberCount ?></h3>
                <p>Member Registrations</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <!-- Associate Registration -->
    <div class="col-lg-4 col-md-6 col-12">
        <div class="small-box dashboard-box">
            <div class="inner">
                <h3><?= $associateCount ?></h3>
                <p>Associate Registrations</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
        </div>
    </div>

    <!-- Website Visitors -->
    <div class="col-lg-4 col-md-6 col-12">
        <div class="small-box dashboard-box">
            <div class="inner">
                <h3><?= $data['visitor_count'] ?></h3>
                <p>Website Visitors</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-line"></i>
            </div>
        </div>
    </div>

</div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <?php

            if (isset($_GET['aboutsetting'])) {
            
$about_query = mysqli_query($conn, "SELECT * FROM about_us");
while($about = mysqli_fetch_assoc($about_query)){
?>

<div class="card about-card col-lg-12">

    <div class="about-header">
        <h4>
            <i class="fas fa-user-edit mr-2"></i>
            Update About Section
        </h4>
    </div>

    <div class="profile-preview">
        <img src="../img/<?= $about['image'] ?>" alt="Profile Image">

        <h5 class="mt-3 text-dark">
            Current Profile Image
        </h5>
    </div>

    <form action="../includes/admin.php"
          method="post"
          enctype="multipart/form-data">

        <input type="hidden"
               name="about_id"
               value="<?= $about['id'] ?>">

        <div class="card-body">

            <div class="form-group">

                <label class="custom-label">
                    <i class="fas fa-image"></i>
                    Upload New Profile Image
                </label>

                <div class="upload-box">

                    <i class="fas fa-cloud-upload-alt"></i>

                    <p class="mb-2">
                        Select a new profile image
                    </p>

                    <input type="file"
                           class="form-control"
                           name="profile">

                </div>

            </div>

            <div class="form-group mt-4">

                <label class="custom-label">
                    <i class="fas fa-heading"></i>
                    Title
                </label>

                <input type="text"
                       class="form-control custom-input"
                       name="title"
                       value="<?= $about['title'] ?>">

            </div>

            <div class="form-group mt-4">

                <label class="custom-label">
                    <i class="fas fa-align-left"></i>
                    About Description
                </label>

                <textarea rows="8"
                          class="form-control custom-textarea"
                          name="description"><?= $about['description'] ?></textarea>

            </div>

        </div>

        <div class="card-footer bg-white text-right">

            <button type="submit"
                    name="update-about"
                    class="btn btn-save">

                <i class="fas fa-save mr-2"></i>
                Save Changes

            </button>

        </div>

    </form>

</div>

<?php
}
            }
?>
<?php
            if (isset($_GET['infosetting'])) {
            ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Update Information</h3>
                </div>
                <div class="card-body p-0">
                  <table class="table">
                    <thead>
                      <tr>

                        <th>Id</th>
                        <th>Title</th>
                        <th style="width: 500px;">Description</th>

                        <th>Action</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $q8 = "SELECT * from home_info";
                      $r8 = mysqli_query($conn, $q8);
                      $c8 = 1;
                      while ($pi8 = mysqli_fetch_array($r8)) {
                      ?>
                        <tr>
                          <td><?= $c8 ?></td>

                          <td><?= $pi8['title'] ?></td>
                          <td><?= $pi8['descr'] ?></td>




                          <td>
                            <form action="editinfo.php" method="POST">
                              <input type="hidden" name="editid" value="<?= $pi8['id'] ?>">
                              <button type="submit" name="editnews" class="btn btn-success"> <span class="glyphicon glyphicon-remove-circle"></span></a>Edit</button>
                            </form>
                          </td>

                          <td>

                            <a class="btn btn-danger" href="../includes/deleteevent.php?id=<?= $pi['id'] ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
                          </td>
                        </tr>
                      <?php
                        $c8++;
                      }
                      ?>


                    </tbody>
                  </table>
                </div>

                <!-- /.card-header -->
                <!-- form start -->



              </div>
            <?php
            } elseif (isset($_GET['eventsetting'])) {
            ?>

              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Mannage events</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->


                <form role="form" action="../includes/admin.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group col-6">


                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Event Image <b class="text-danger">(Image should be less than 1 Mb) </b></label>
                      <input type="file" class="form-control" name="epic">
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Event Description</label>
                      <input type="text" class="form-control" name="edesc" id="exampleInputEmail1">
                    </div>



                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="add-event" class="btn btn-primary">Add Event</button>
                  </div>
                </form>
              </div>
            <?php
            } elseif (isset($_GET['viewevent'])) {
            ?>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Events</h3>


                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table">
                      <thead>
                        <tr>

                          <th>Id</th>
                          <th>Event Image</th>
                          <th>Description</th>

                          <th style="width: 40px">Action</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $q = "SELECT * from work_event";
                        $r = mysqli_query($conn, $q);
                        $c = 1;
                        while ($pi = mysqli_fetch_array($r)) {
                        ?>
                          <tr>
                            <td><?= $c ?></td>

                            <td><img src="../assets/documents/work/<?= $pi['epic'] ?>" style="width:150px" /></td>
                            <td><?= $pi['edesc'] ?></td>





                            <td>
                              <form action="editevent.php?id =<?= $pi['id'] ?>" method="POST">
                                <input type="hidden" name="editid" value="<?= $pi['id'] ?>">
                                <button type="submit" name="editnews" class="btn btn-success"> <span class="glyphicon glyphicon-remove-circle"></span></a>Edit</button>
                              </form>
                            </td>

                            <td>

                              <a class="btn btn-danger" href="../includes/deleteevent.php?id=<?= $pi['id'] ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
                            </td>
                          </tr>
                        <?php
                          $c++;
                        }
                        ?>


                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            <?php

            } elseif (isset($_GET['newssetting'])) {
            ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Mannage news</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->


                <form role="form" action="../includes/admin.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group col-6">


                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">News Image <b class="text-danger"> (Image should be less than 1 Mb) </b></label>
                      <input type="file" class="form-control" name="npic">
                    </div>




                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="add-news" class="btn btn-primary">Add news</button>
                  </div>
                </form>
              </div>
            <?php
            } elseif (isset($_GET['viewnews'])) {
            ?>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">News</h3>


                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table">
                      <thead>
                        <tr>

                          <th>Id</th>
                          <th>News</th>


                          <th style="width: 40px">Action</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $q2 = "SELECT * from work_news";
                        $r2 = mysqli_query($conn, $q2);
                        $c2 = 1;
                        while ($pi2 = mysqli_fetch_array($r2)) {
                        ?>
                          <tr>
                            <td><?= $c2 ?></td>

                            <td><img src="../assets/documents/news/<?= $pi2['npic'] ?>" style="width:150px" /></td>







                            <td>
                              <form action="editnews.php" method="POST">
                                <input type="hidden" name="editid" value="<?= $pi2['id'] ?>">
                                <button type="submit" name="editnews" class="btn btn-success"> <span class="glyphicon glyphicon-remove-circle"></span></a>Edit</button>
                              </form>
                            </td>
                            <td>

                              <a class="btn btn-danger" href="../includes/deletenews.php?id=<?= $pi2['id'] ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>

                            </td>
                          </tr>
                        <?php
                          $c2++;
                        }
                        ?>


                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

            <?php
            } else if (isset($_GET['basetting'])) {
            ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Mannage work</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->


                <form role="form" action="../includes/admin.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Select Type</label><br>
                      <select name="type" class="form-control">

                        <option value="before">Before</option>
                        <option value="after">After</option>
                      </select>

                    </div>

                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Gallery Image <b class="text-danger"> (Image should be less than 1 Mb) </b></label>
                      <input type="file" class="form-control" name="wpic">
                    </div>







                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="add-work" class="btn btn-primary">Add Gallery</button>
                  </div>
                </form>
              </div>

            <?php
            } elseif (isset($_GET['viewba'])) {
            ?>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Work</h3>


                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table">
                      <thead>
                        <tr>

                          <th>Id</th>
                          <th>Work</th>
                          <th>Categories</th>


                          <th style="width: 40px">Action</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $q13 = "SELECT * from work_ba";
                        $r13 = mysqli_query($conn, $q13);
                        $c13 = 1;
                        while ($pi13 = mysqli_fetch_array($r13)) {
                        ?>
                          <tr>
                            <td><?= $c13 ?></td>

                            <td><img src="../assets/documents/before/<?= $pi13['wpic'] ?>" style="width:150px" /></td>

                            <td><?= $pi13['type'] ?></td>





                            <td>
                              <form action="editwork.php?id =//<?= $pi13['id'] ?>" method="POST">
                                <input type="hidden" name="editid" value="<?= $pi13['id'] ?>">
                                <button type="submit" name="editnews" class="btn btn-success"> <span class="glyphicon glyphicon-remove-circle"></span></a>Edit</button>
                              </form>
                            </td>
                            <td>

                              <a class="btn btn-danger" href="../includes/deletework.php?id=<?= $pi13['id'] ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>

                            </td>
                          </tr>
                        <?php
                          $c13++;
                        }
                        ?>


                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>


              <?php
              ?>

            <?php
            } elseif (isset($_GET['gallerysetting'])) {
            ?>
            <div class="card shadow-lg border-0 slider-card col-lg-12">
    
    <div class="card-header slider-header">
        <h3 class="card-title mb-0">
            <i class="fas fa-images me-2"></i>
            Manage Gallery
        </h3>
    </div>

    <form action="../includes/admin.php" method="post" enctype="multipart/form-data">

        <div class="card-body">

            <div class="upload-box">

                

                <div class="form-group">
                  <div class="text-center mb-4">
                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                    <h5 class="mt-3">Upload Gallery Image</h5>
                    <p class="text-muted mb-0">
                        Supported formats: JPG, PNG, WEBP
                        <span class="text-danger">
                            (Image should be less than 1 MB)
                        </span>
                    </p>
                </div>

                    <input type="file"
                           class="form-control "
                           name="gpic"
                           required>
                </div>

            </div>

        </div>

        <div class="card-footer bg-white text-center border-0 pb-4">

            <button type="submit"
                    name="add-gallery"
                    class="btn slider-btn">
                <i class="fas fa-plus-circle"></i>
                Add Gallery
            </button>

        </div>

    </form>

</div>
                          <?php
            } else if (isset($_GET['viewgallery'])) {

            ?>
               <div class="col-12">
    <div class="card slider-card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                <i class="fas fa-images mr-2"></i>  Gallery
            </h3>
        </div>

        <div class="card-body p-0">

            <table class="table slider-table mb-0">
                <thead>
                    <tr>
                        <th width="10%">Sr no</th>
                        <th>Gallery Image</th>
                        <th width="15%">Edit</th>
                        <th width="15%">Delete</th>
                    </tr>
                </thead>
                      </thead>

             
                      <tbody>
                        <?php
                        $q3 = "SELECT * from gallery";
                        $r3 = mysqli_query($conn, $q3);
                        $c3 = 1;
                        while ($pi3 = mysqli_fetch_array($r3)) {
                        ?>
                          <tr>
                            <td >
                               <span class="serial-badge">
                                <?= $c3 ?>
                            </span>
                              </td>
                           
                            <td><img src="../img/gallery/<?= $pi3['image'] ?>" class="slider-img" /></td>







                            <td>
                              <form action="editgal.php?id =<?= $pi3['id'] ?>" method="POST">
                                <input type="hidden" name="editid" value="<?= $pi3['id'] ?>">
                                <button type="submit" name="editnews" class="btn btn-edit"><i class="fas fa-edit"></i>Edit</button>
                              </form>

                               
                            </td>
                            <td>

                              <a class="btn btn-delete" href="../includes/deletegallery.php?id=<?= $pi3['id'] ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><i class="fas fa-trash-alt"></i> Delete</a>

                            </td>
                            
                          </tr>
                        <?php
                          $c3++;
                        }
                        ?>


                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

            <?php
            } elseif (isset($_GET['contactsetting'])) {
            ?>
            <style>
    .member-card{
        border:none;
        border-radius:15px;
        overflow:hidden;
        box-shadow:0 8px 25px rgba(0,0,0,0.1);
    }

    .member-card .card-header{
        background:#0C2B4B;
        color:#fff;
        border-bottom:4px solid #D4AF37;
        padding:18px 25px;
    }

    .member-card .card-title{
        margin:0;
        font-size:22px;
        font-weight:600;
    }

    .member-table thead{
        background:#0C2B4B;
        color:#fff;
    }

    .member-table tbody tr:hover{
        background:#f8f9fa;
    }

    .badge-package{
        background:#D4AF37;
        color:#0C2B4B;
        font-weight:600;
        padding:8px 12px;
        border-radius:20px;
    }

    .table td,
    .table th{
        vertical-align:middle;
        white-space:nowrap;
    }

    .member-count{
        color:#D4AF37;
        font-weight:bold;
    }

    .btn-view{
        background:#0C2B4B;
        color:#fff;
        border:none;
    }

    .btn-view:hover{
        background:#D4AF37;
        color:#0C2B4B;
    }
</style>
            <div class="card member-card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <i class="fas fa-users mr-2"></i>
            Contacted users
        </h3>

        
    </div>
              <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover member-table">

                <thead>
                    <tr>
                        <th>#</th>
                       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                       <th>Subject</th>
                       
                        <th>Message</th>
                         <th>Created at</th>
                        
                    </tr>
                </thead>

                <tbody>

                <?php
                $query = "SELECT * FROM contact_messages ORDER BY id DESC";
                $run = mysqli_query($conn,$query);

                $count = 1;

                while($row = mysqli_fetch_assoc($run)){
                ?>

                    <tr>

                        <td><?= $count++; ?></td>

                      

                        <td><?= $row['name']; ?></td>

                        <td><?= $row['email']; ?></td>

                        <td><?= $row['mobile']; ?></td>
                        <td><?= $row['subject']; ?></td>

                        <td><?= $row['message']; ?></td>
                        

                        

                       


                        <td>
                            <?= date('d M Y h:i A',strtotime($row['created_at'])); ?>
                        </td>
                        


                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>
</div>

             <?php
            } elseif (isset($_GET['viewstaff'])) {
            ?>
            <style>
    .member-card{
        border:none;
        border-radius:15px;
        overflow:hidden;
        box-shadow:0 8px 25px rgba(0,0,0,0.1);
    }

    .member-card .card-header{
        background:#0C2B4B;
        color:#fff;
        border-bottom:4px solid #D4AF37;
        padding:18px 25px;
    }

    .member-card .card-title{
        margin:0;
        font-size:22px;
        font-weight:600;
    }

    .member-table thead{
        background:#0C2B4B;
        color:#fff;
    }

    .member-table tbody tr:hover{
        background:#f8f9fa;
    }

    .badge-package{
        background:#D4AF37;
        color:#0C2B4B;
        font-weight:600;
        padding:8px 12px;
        border-radius:20px;
    }

    .table td,
    .table th{
        vertical-align:middle;
        white-space:nowrap;
    }

    .member-count{
        color:#D4AF37;
        font-weight:bold;
    }

    .btn-view{
        background:#0C2B4B;
        color:#fff;
        border:none;
    }

    .btn-view:hover{
        background:#D4AF37;
        color:#0C2B4B;
    }
</style>
            <div class="card member-card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <i class="fas fa-users mr-2"></i>
            View Staff
        </h3>

        
    </div>
              <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover member-table">

                <thead>
                    <tr>
                        <th>#</th>
                       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                      
                         <th>Created at</th>

                        
                    </tr>
                </thead>

                <tbody>

                <?php
                $query = "SELECT * FROM admin";
                $run = mysqli_query($conn,$query);

                $count = 1;

                while($row = mysqli_fetch_assoc($run)){
                ?>

                    <tr>

                        <td><?= $count++; ?></td>

                      

                        <td><?= $row['name']; ?></td>

                        <td><?= $row['email']; ?></td>

                        <td><?= $row['mobile']; ?></td>
                       
                        

                        

                       


                        <td>
                            <?= date('d M Y h:i A',strtotime($row['created_at'])); ?>
                        </td>
                        


                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>
</div>
 <?php
            } elseif (isset($_GET['staffsetting'])) {
            ?>

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
            
              <div class="container custom-card p-4">

    <h3 class="form-title">Add Staff</h3>

    <form role="form" action="../includes/admin.php" method="post">

        <div class="form-group mb-3">
            <label>Full Name</label>
            <input type="text" class="form-control" name="fullname"
                   >
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email"
                  >
        </div>
        <div class="form-group mb-3">
            <label>Mobile</label>
            <input type="tel" class="form-control" name="mobile"
                  required
           pattern="[6-9]{1}[0-9]{9}"
           maxlength="10"  >
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="text" class="form-control" name="password"
                  >
        </div>

        <div class="card-footer text-end">
            <button type="submit" name="add-staff" class="btn btn-save">
                Add Staff
            </button>
        </div>

    </form>
</div>
              

            <?php
            } elseif (isset($_GET['accountsetting'])) {
            ?>

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
            
              <div class="container custom-card p-4">

    <h3 class="form-title">Update Account</h3>

    <form role="form" action="../includes/admin.php" method="post">

        <div class="form-group mb-3">
            <label>Full Name</label>
            <input type="text" class="form-control" name="fullname"
                   value="<?= $user_data['name'] ?>">
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email"
                   value="<?= $user_data['email'] ?>">
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="text" class="form-control" name="password"
                   value="<?= $user_data['password'] ?>">
        </div>

        <div class="card-footer text-end">
            <button type="submit" name="update-account" class="btn btn-save">
                Update Account
            </button>
        </div>

    </form>
</div>
              <?php
            } elseif (isset($_GET['sitesetting'])) {
            ?>
              <div class="card site-card col-lg-12">

    <div class="site-header">
        <h3>
            <i class="fas fa-cogs mr-2"></i>
            Site Settings
        </h3>
    </div>

    <form action="../includes/admin.php"
          method="post"
          enctype="multipart/form-data">

        <div class="card-body">

            <h5 class="section-title">
                General Information
            </h5>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label-custom">
                            <i class="fas fa-building"></i>
                            Site Name
                        </label>
                        <input type="text"
                               class="form-control form-control-custom"
                               name="siteName"
                               value="<?= $user_data['site_name'] ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label-custom">
                            <i class="fas fa-envelope"></i>
                            Email
                        </label>
                        <input type="email"
                               class="form-control form-control-custom"
                               name="email"
                               value="<?= $user_data['email'] ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label-custom">
                            <i class="fas fa-phone"></i>
                            Phone Number
                        </label>
                        <input type="text"
                               class="form-control form-control-custom"
                               name="phone"
                               value="<?= $user_data['phone'] ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label-custom">
                            <i class="fas fa-map-marker-alt"></i>
                            Address
                        </label>
                        <input type="text"
                               class="form-control form-control-custom"
                               name="address"
                               value="<?= $user_data['address'] ?>">
                    </div>
                </div>

            </div>

            <hr>

            <h5 class="section-title">
                Social Media Links
            </h5>

            <div class="social-box">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label-custom">
                                <i class="fab fa-facebook"></i>
                                Facebook
                            </label>
                            <input type="text"
                                   class="form-control form-control-custom"
                                   name="facebook"
                                   value="<?= $user_data['facebook'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label-custom">
                                <i class="fab fa-instagram"></i>
                                Instagram
                            </label>
                            <input type="text"
                                   class="form-control form-control-custom"
                                   name="instagram"
                                   value="<?= $user_data['instagram'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label-custom">
                                <i class="fab fa-twitter"></i>
                                Twitter / X
                            </label>
                            <input type="text"
                                   class="form-control form-control-custom"
                                   name="twitter"
                                   value="<?= $user_data['twitter'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label-custom">
                                <i class="fab fa-linkedin"></i>
                                LinkedIn
                            </label>
                            <input type="text"
                                   class="form-control form-control-custom"
                                   name="linkedin"
                                   value="<?= $user_data['linkedin'] ?>">
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="card-footer bg-white text-right">

            <button type="submit"
                    name="update-siteSetting"
                    class="btn btn-update">

                <i class="fas fa-save mr-2"></i>
                Update Settings

            </button>

        </div>

    </form>

</div>
           
            <?php
            } elseif (isset($_GET['slidersetting'])) {
            ?>
              <div class="card shadow-lg border-0 slider-card col-lg-12">
    
    <div class="card-header slider-header">
        <h3 class="card-title mb-0">
            <i class="fas fa-images me-2"></i>
            Manage Slider
        </h3>
    </div>

    <form action="../includes/admin.php" method="post" enctype="multipart/form-data">

        <div class="card-body">

            <div class="upload-box">

                

                <div class="form-group">
                  <div class="text-center mb-4">
                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                    <h5 class="mt-3">Upload Slider Image</h5>
                    <p class="text-muted mb-0">
                        Supported formats: JPG, PNG, WEBP
                        <span class="text-danger">
                            (Image should be less than 1 MB)
                        </span>
                    </p>
                </div>

                    <input type="file"
                           class="form-control "
                           name="banner_image"
                           required>
                </div>

            </div>

        </div>

        <div class="card-footer bg-white text-center border-0 pb-4">

            <button type="submit"
                    name="add-slider"
                    class="btn slider-btn">
                <i class="fas fa-plus-circle"></i>
                Add Slider
            </button>

        </div>

    </form>

</div>
            <?php
            } elseif (isset($_GET['viewslider'])) {
            ?>
              <div class="col-12">
    <div class="card slider-card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                <i class="fas fa-images mr-2"></i>  Slider
            </h3>
        </div>

        <div class="card-body p-0">

            <table class="table slider-table mb-0">
                <thead>
                    <tr>
                        <th width="10%">Sr no</th>
                        <th>Slider Image</th>
                        <th width="15%">Edit</th>
                        <th width="15%">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $q21 = "SELECT * FROM sliders";
                    $r21 = mysqli_query($conn, $q21);
                    $c21 = 1;

                    while ($pi21 = mysqli_fetch_array($r21)) {
                    ?>
                    <tr>

                        <td>
                            <span class="serial-badge">
                                <?= $c21 ?>
                            </span>
                        </td>

                        <td>
                            <img src="../img/slider/<?= $pi21['image'] ?>"
                                 class="slider-img">
                        </td>

                        <td>
                            <form action="editslider.php" method="POST">
                                <input type="hidden"
                                       name="editid"
                                       value="<?= $pi21['id'] ?>">

                                <button type="submit"
                                        name="editnews"
                                        class="btn btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </form>
                        </td>

                        <td>
                            <a class="btn btn-delete"
                               href="../includes/deleteslider.php?id=<?= $pi21['id'] ?>"
                               onclick="return confirm('Are you sure you want to delete this slider?')">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                        </td>

                    </tr>
                    <?php
                        $c21++;
                    }
                    ?>
                </tbody>

            </table>

        </div>
    </div>
</div>
            <?php
            } elseif (isset($_GET['videosetting'])) {
            ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Mannage news</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->


                <form role="form" action="../includes/admin.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group col-6">


                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Url <b class="text-danger"> </b></label>
                      <input type="text" class="form-control" name="url">
                    </div>




                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="add-video" class="btn btn-primary">Add video</button>
                  </div>
                </form>
              </div>
            <?php
            }elseif (isset($_GET['viewvideo'])) {
              ?>
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Video</h3>
  
  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
  
                            <th>Id</th>
                            <th>Video</th>
  
  
                            <th style="width: 40px">Action</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $qq2 = "SELECT * from home_video";
                          $rr2 = mysqli_query($conn, $qq2);
                          $cc2 = 1;
                          while ($pii2 = mysqli_fetch_array($rr2)) {
                          ?>
                            <tr>
                              <td><?= $cc2 ?></td>
  
                              <td><iframe width="390" height="200" src="<?=$rp = str_replace("watch?v=","embed/",$pii2['url']);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a></td>
  
  
  
  
  
  
  
                              <td>
                                <form action="editvideo.php" method="POST">
                                  <input type="hidden" name="editid" value="<?= $pii2['id'] ?>">
                                  <button type="submit" name="editnews" class="btn btn-success"> <span class="glyphicon glyphicon-remove-circle"></span></a>Edit</button>
                                </form>
                              </td>
                              <td>
  
                                <a class="btn btn-danger" href="../includes/deletevideo.php?id=<?= $pii2['id'] ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
  
                              </td>
                            </tr>
                          <?php
                            $cc2++;
                          }
                          ?>
  
  
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
  
              <?php
            }elseif (isset($_GET['viewmember'])) {
              
              ?>
<style>
    .member-card{
        border:none;
        border-radius:15px;
        overflow:hidden;
        box-shadow:0 8px 25px rgba(0,0,0,0.1);
    }

    .member-card .card-header{
        background:#0C2B4B;
        color:#fff;
        border-bottom:4px solid #D4AF37;
        padding:18px 25px;
    }

    .member-card .card-title{
        margin:0;
        font-size:22px;
        font-weight:600;
    }

    .member-table thead{
        background:#0C2B4B;
        color:#fff;
    }

    .member-table tbody tr:hover{
        background:#f8f9fa;
    }

    .badge-package{
        background:#D4AF37;
        color:#0C2B4B;
        font-weight:600;
        padding:8px 12px;
        border-radius:20px;
    }

    .table td,
    .table th{
        vertical-align:middle;
        white-space:nowrap;
    }

    .member-count{
        color:#D4AF37;
        font-weight:bold;
    }

    .btn-view{
        background:#0C2B4B;
        color:#fff;
        border:none;
    }

    .btn-view:hover{
        background:#D4AF37;
        color:#0C2B4B;
    }
</style>

<div class="card member-card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <i class="fas fa-users mr-2"></i>
            Membership Registrations
        </h3>

        <?php
        $countQuery = mysqli_query($conn,"SELECT COUNT(*) as total FROM membership_registrations");
        $countData = mysqli_fetch_assoc($countQuery);
        ?>

        <span class="member-count">
            Total Members : <?= $countData['total']; ?>
        </span>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover member-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Package</th>
                        <th>Member Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Membership</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Transaction ID</th>
                        <th>Created On</th>
                        <th>Status</th>
<th width="120">Actions</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $query = "SELECT * FROM membership_registrations ORDER BY id DESC";
                $run = mysqli_query($conn,$query);

                $count = 1;

                while($row = mysqli_fetch_assoc($run)){
                ?>

                    <tr>

                        <td><?= $count++; ?></td>

                        <td>
                            <span class="badge-package">
                                <?= $row['package_name']; ?>
                            </span>
                        </td>

                        <td><?= $row['member_name']; ?></td>

                        <td><?= $row['email']; ?></td>

                        <td><?= $row['contact_no']; ?></td>

                        <td><?= $row['membership_type']; ?></td>

                        <td><?= date('d M Y',strtotime($row['start_date'])); ?></td>

                        <td><?= date('d M Y',strtotime($row['end_date'])); ?></td>

                        <td>
                            <small>
                                <?= $row['transaction_id']; ?>
                            </small>
                        </td>

                        <td>
                            <?= date('d M Y h:i A',strtotime($row['created_at'])); ?>
                        </td>
                        <td>
    <?php if($row['status']=='Active'){ ?>
        <a href="../includes/member-status.php?id=<?= $row['id'] ?>&status=Inactive"
           class="btn btn-sm"
           style="background:#28a745;color:#fff;border-radius:20px;">
            Active
        </a>
    <?php } else { ?>
        <a href="../includes/member-status.php?id=<?= $row['id'] ?>&status=Active"
           class="btn btn-sm"
           style="background:#dc3545;color:#fff;border-radius:20px;">
            Inactive
        </a>
    <?php } ?>
</td>

<td>

    <div class="btn-group">

        <form action="editmember.php" method="POST">
            <input type="hidden"
                   name="editid"
                   value="<?= $row['id']; ?>">

            <button type="submit"
                    class="btn btn-sm"
                    style="background:#0C2B4B;color:#fff;">
                <i class="fas fa-edit"></i>
            </button>
        </form>

        <a href="../includes/deletemember.php?id=<?= $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this member?')"
           class="btn btn-sm"
           style="background:#D4AF37;color:#0C2B4B;margin-left:5px;">

            <i class="fas fa-trash"></i>

        </a>

    </div>

</td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

 <?php
            }elseif (isset($_GET['viewassociate'])) {
              
              ?>
<style>
    .member-card{
        border:none;
        border-radius:15px;
        overflow:hidden;
        box-shadow:0 8px 25px rgba(0,0,0,0.1);
    }

    .member-card .card-header{
        background:#0C2B4B;
        color:#fff;
        border-bottom:4px solid #D4AF37;
        padding:18px 25px;
    }

    .member-card .card-title{
        margin:0;
        font-size:22px;
        font-weight:600;
    }

    .member-table thead{
        background:#0C2B4B;
        color:#fff;
    }

    .member-table tbody tr:hover{
        background:#f8f9fa;
    }

    .badge-package{
        background:#D4AF37;
        color:#0C2B4B;
        font-weight:600;
        padding:8px 12px;
        border-radius:20px;
    }

    .table td,
    .table th{
        vertical-align:middle;
        white-space:nowrap;
    }

    .member-count{
        color:#D4AF37;
        font-weight:bold;
    }

    .btn-view{
        background:#0C2B4B;
        color:#fff;
        border:none;
    }

    .btn-view:hover{
        background:#D4AF37;
        color:#0C2B4B;
    }
</style>

<div class="card member-card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <i class="fas fa-users mr-2"></i>
            Associate Registrations
        </h3>

        <?php
        $countQuery = mysqli_query($conn,"SELECT COUNT(*) as total FROM associate_registrations");
        $countData = mysqli_fetch_assoc($countQuery);
        ?>

        <span class="member-count">
            Total Members : <?= $countData['total']; ?>
        </span>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover member-table">

                <thead>
                    <tr>
                        <th>#</th>
                       
                        <th>Member Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                       <th>Address</th>
                       
                        <th>Amount</th>
                        <th>Transaction ID</th>
                        <th>Created On</th>
                        <th>Status</th>
<th width="120">Actions</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $query = "SELECT * FROM associate_registrations ORDER BY id DESC";
                $run = mysqli_query($conn,$query);

                $count = 1;

                while($row = mysqli_fetch_assoc($run)){
                ?>

                    <tr>

                        <td><?= $count++; ?></td>

                      

                        <td><?= $row['member_name']; ?></td>

                        <td><?= $row['email']; ?></td>

                        <td><?= $row['contact_no']; ?></td>
                        <td><?= $row['address']; ?></td>

                        <td><?= $row['amount']; ?></td>
                        

                        

                       

                        <td>
                            <small>
                                <?= $row['transaction_id']; ?>
                            </small>
                        </td>

                        <td>
                            <?= date('d M Y h:i A',strtotime($row['created_at'])); ?>
                        </td>
                        <td>
    <?php if($row['status']=='Active'){ ?>
        <a href="../includes/associate-status.php?id=<?= $row['id'] ?>&status=Inactive"
           class="btn btn-sm"
           style="background:#28a745;color:#fff;border-radius:20px;">
            Active
        </a>
    <?php } else { ?>
        <a href="../includes/associate-status.php?id=<?= $row['id'] ?>&status=Active"
           class="btn btn-sm"
           style="background:#dc3545;color:#fff;border-radius:20px;">
            Inactive
        </a>
    <?php } ?>
</td>

<td>

    <div class="btn-group">

        <form action="editassociate.php" method="POST">
            <input type="hidden"
                   name="editid"
                   value="<?= $row['id']; ?>">

            <button type="submit"
                    class="btn btn-sm"
                    style="background:#0C2B4B;color:#fff;">
                <i class="fas fa-edit"></i>
            </button>
        </form>

        <a href="../includes/deleteassociate.php?id=<?= $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this associate member?')"
           class="btn btn-sm"
           style="background:#D4AF37;color:#0C2B4B;margin-left:5px;">

            <i class="fas fa-trash"></i>

        </a>

    </div>

</td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php
}
?>





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
    <footer class="main-footer side-bar-bg" >
      <center> <strong>Copyright &copy; 2020-2021 <a href="https://adminlte.io"> <span style="color:#F5D77E;">D-Empire.LLP</span> </a>.</strong>
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