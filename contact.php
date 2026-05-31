<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO contact_messages (name, email,mobile, subject, message)
            VALUES ('$name', '$email','$mobile', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Message Submitted Successfully');
                window.location='contact.php';
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}
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
            <h1 class="display-4 text-white animated slideInDown mb-4">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    
                    <li class="breadcrumb-item text-primary active" aria-current="page">Helpline</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

<div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 450px;">
                    <div class="position-relative h-100">
                        <img class="position-relative w-100 h-100"
                        src="img/about-2.jpeg"
                         style="min-height: 450px; border:0;" >
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <h6 class="text-primary text-uppercase mb-2">Contact Us</h6>
                    <h1 class="display-6 mb-4">If You Have Any Query, Please Contact Us</h1>
                    <!-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> -->
                   <form method="POST" action="">
    <div class="row g-3">

        <!-- Name -->
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control border-0 bg-light"
                       id="name" name="name" placeholder="Your Name" required>
                <label for="name">Your Name</label>
            </div>
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <div class="form-floating">
                <input type="email" class="form-control border-0 bg-light"
                       id="email" name="email" placeholder="Your Email" required>
                <label for="email">Your Email</label>
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-floating">
                    <input type="tel" class="form-control border-0 bg-light"
                id="mobile" name="mobile"
                placeholder="Your Mobile Number"
                required
                pattern="[6-9]{1}[0-9]{9}"
                maxlength="10">
                <label for="subject">Your Mobile</label>
                    </div>
                    </div>

        <!-- Subject -->
        <div class="col-6">
            <div class="form-floating">
                <input type="text" class="form-control border-0 bg-light"
                       id="subject" name="subject" placeholder="Subject" required>
                <label for="subject">Subject</label>
            </div>
        </div>

        <!-- Message -->
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control border-0 bg-light"
                          id="message" name="message"
                          style="height: 150px" placeholder="Message" required></textarea>
                <label for="message">Message</label>
            </div>
        </div>

        <!-- Submit -->
        <div class="col-12">
            <button class="btn btn-primary py-3 px-5" type="submit">
                Send Message
            </button>
        </div>

    </div>
</form>
                </div>
            </div>
        </div>
    </div>
   
  
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