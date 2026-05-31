<?php
require_once 'config/database.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CLUB THL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
   <?php include 'includes/header.php'; ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
     
   <?php include 'includes/navbar.php'; ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    
                    <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
     <?php



$query = "SELECT * FROM about_us ORDER BY id ASC";
$result = mysqli_query($conn, $query);

$index = 0;

while ($about = mysqli_fetch_assoc($result)) {

    $index++;
?>
    <?php if($index % 2 != 0) { ?>

<div class="container-xxl my-5">
    <div class="container">
        <div class="row g-5 align-items-center">

            <div class="col-lg-6">
                <div class="position-relative overflow-hidden gold-border h-100" style="min-height: 400px;">
                    <img class="position-absolute img-fluid w-100 h-100"
                         src="img/<?php echo $about['image']; ?>"
                         alt="">
                </div>
            </div>

            <div class="col-lg-6">
               
                <h1 class="display-6 mb-4">
                    <?php echo $about['title']; ?>
                </h1>

                <p>
                    <?php echo nl2br($about['description']); ?>
                </p>
            </div>

        </div>
    </div>
</div>

<?php } else { ?>
<div class="container-xxl my-5">
    <div class="container">
        <div class="row g-5 align-items-center">

            <div class="col-lg-6">
                
                <h1 class="display-6 mb-4">
                    <?php echo $about['title']; ?>
                </h1>

                <p>
                    <?php echo nl2br($about['description']); ?>
                </p>
            </div>

            <div class="col-lg-6">
                <div class="position-relative overflow-hidden gold-border h-100" style="min-height: 400px;">
                    <img class="position-absolute img-fluid w-100 h-100"
                         src="img/<?php echo $about['image']; ?>"
                         alt="">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
          
        </div>

        </div>
    </div>
</div>

<?php } ?>

<?php } ?>
  
    <!-- About End -->


  


    <!-- Footer Start -->
    <?php include 'includes/footer.php'; ?>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>