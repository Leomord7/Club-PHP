<?php
require_once 'config/database.php';


if(!isset($_SESSION['visitor_counted']))
{
    mysqli_query(
        $conn,
        "UPDATE website_visitors
         SET visitor_count = visitor_count + 1
         WHERE id = 1"
    );

    $_SESSION['visitor_counted'] = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ClUB THL</title>
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
 
<link href="lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->


  <!-- Topbar Start -->
  
  <!-- Topbar End -->


  <!-- Navbar Start -->
  <!-- <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
      <img src="img/clublogo.png" alt="Logo" height="100">
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="index.html" class="nav-item nav-link active">Home</a>
        <a href="about.html" class="nav-item nav-link">About</a>
        <a href="courses.html" class="nav-item nav-link">Gallery</a>
        <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Registration</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="feature.html" class="dropdown-item">Member Registration</a>
                        <a href="appointment.html" class="dropdown-item">Associate Registration</a>
                        
                    </div>
                </div>
       
      </div>
      <a href="" class=" btn btn-primary py-4 px-lg-5 text-dark d-none d-lg-block">Join us<i
          class="fa fa-arrow-right ms-3"></i></a>
    </div>
  </nav> -->
  <!-- Navbar End -->
   <?php include 'includes/header.php'; ?>
   <?php include 'includes/navbar.php'; ?>


  <!-- Carousel Start -->
  <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">

      <div class="carousel-inner">
        <?php
$sliderQuery = "SELECT * FROM sliders WHERE status = 1 ORDER BY id DESC";
$sliderRun = mysqli_query($conn, $sliderQuery);

$first = true;
while($slider = mysqli_fetch_array($sliderRun)){
?>
        <div class="carousel-item <?= $first ? 'active' : '' ?>">
    
    <img class="w-100"
         src="img/slider/<?= $slider['image'] ?>"
         alt="Slider Image">

    <div class="carousel-caption">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">

                    <!-- <h1 class="display-4 text-white mb-4 animated slideInDown">
                        <?= $slider['title'] ?>
                    </h1>

                    <a href="member-registration.php"
                       class="btn btn-primary py-3 px-5">
                        Join Now
                    </a> -->

                </div>
            </div>
        </div>
    </div>

</div>
<?php
$first = false;
}
?>
        <!-- <div class="carousel-item">
                    <img class="w-100 h-80" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h4 class="display-2 text-light mb-5 animated slideInDown">Safe Driving Is Our Top Priority</h4>
                                    <h1 class=" text-light mb-5 animated slideInDown">Your Premium Lifestyle Community</h1>
                                     <a href="" class="btn btn-primary py-sm-3 px-sm-5">Join today</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Carousel End -->


  <!-- Facts Start -->
  <!-- <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-car text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Easy Driving Learn </h5>
                                <span>Clita erat ipsum lorem sit sed stet duo justo erat amet</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-users text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>National Instructor</h5>
                                <span>Clita erat ipsum lorem sit sed stet duo justo erat amet</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-file-alt text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Get licence</h5>
                                <span>Clita erat ipsum lorem sit sed stet duo justo erat amet</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
  <!-- Facts End -->


  <!-- About Start -->
  <div class="container-xxl py-3">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="position-relative overflow-hidden gold-border h-100" style="min-height: 400px;">
            <img class="position-absolute w-100 h-100" src="img/about-1.jpeg" alt="" style="object-fit: cover;">
            <!-- <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="img/about-2.jpg" alt="" style="width: 200px; height: 200px;"> -->
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="h-100">
            <h6 class="text-primary text-uppercase mb-2">About Us</h6>
            <h1 class="display-6 mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, doloribus!</h1>
            <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat
              ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
            <p class="mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti quam, architecto
              laboriosam, facilis pariatur dignissimos eligendi eos, adipisci expedita vel nam placeat sunt ratione
              dolore nemo! Ab accusamus quis numquam omnis ipsam laboriosam vero autem molestias alias iure perferendis,
              sequi vitae, delectus impedit porro optio quia temporibus recusandae mollitia corrupti.</p>
            <!-- <div class="row g-2 mb-4 pb-2">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Fully Licensed
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Online Tracking
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Afordable Fee 
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Best Trainers
                            </div>
                        </div> -->
            <div class="row g-4">
              <div class="col-sm-6">
                <a class="btn btn-primary py-3 px-5" href="">Read More</a>
              </div>
              <!-- <div class="col-sm-6">
                                <a class="d-inline-flex align-items-center btn btn-outline-primary border-2 p-2" href="tel:+0123456789">
                                    <span class="flex-shrink-0 btn-square bg-primary">
                                        <i class="fa fa-phone-alt text-white"></i>
                                    </span>
                                    <span class="px-3">+012 345 6789</span>
                                </a>
                            </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->


  <!-- Courses Start -->
  <div class="courses my-3 py-5 pb-0">
    <div class="container">
      <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h6 class="text-primary text-uppercase mb-2">Our Gallery</h6>
        <h1 class="text-light mb-4">Lorem ipsum dolor, sit amet</h1>
      </div>
      <div class="row g-0 team-items">
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="team-item position-relative">
            <div class="position-relative">
              <img class="img-fluid" src="img/team-1.jpg" alt="">
              <div class="team-social text-center">

                <a href="#" class="btn btn-outline-warning px-4 py-2">
                  See More
                </a>
              </div>
            </div>
            <!-- <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Full Name</h5>
                            <span>Trainer</span>
                        </div> -->
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="team-item position-relative">
            <div class="position-relative">
              <img class="img-fluid" src="img/team-1.jpg" alt="">
              <div class="team-social text-center">

                <a href="#" class="btn btn-outline-warning px-4 py-2">
                  See More
                </a>
              </div>
            </div>
            <!-- <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Full Name</h5>
                            <span>Trainer</span>
                        </div> -->
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="team-item position-relative">
            <div class="position-relative">
              <img class="img-fluid" src="img/team-1.jpg" alt="">
              <div class="team-social text-center">

                <a href="#" class="btn btn-outline-warning px-4 py-2">
                  See More
                </a>
              </div>
            </div>
            <!-- <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Full Name</h5>
                            <span>Trainer</span>
                        </div> -->
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="team-item position-relative">
            <div class="position-relative">
              <img class="img-fluid" src="img/team-1.jpg" alt="">
              <div class="team-social text-center">

                <a href="#" class="btn btn-outline-warning px-4 py-2">
                  See More
                </a>
              </div>
            </div>
            <!-- <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Full Name</h5>
                            <span>Trainer</span>
                        </div> -->
          </div>
        </div>

      </div>
      <div class="row g-4">
              <div class="col-lg-12 ">
                <a class="btn btn-primary py-3 px-5 my-3" style="float: inline-end" href="">Explore Gallery</a>
              </div>
             
            </div>
      <!-- <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4">$99</div>
                            <h5 class="mb-3">Automatic Car Lessons</h5>
                            <p>Tempor erat elitr rebum at clita dolor diam ipsum sit diam amet diam et eos</p>
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i>Beginner</li>
                                <li class="breadcrumb-item small"><i class="fa fa-calendar-alt text-primary me-2"></i>3 Week</li>
                            </ol>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="img/courses-1.jpg" alt="">
                            <div class="courses-overlay">
                                <a class="btn btn-outline-primary border-2" href="">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4">$99</div>
                            <h5 class="mb-3">Highway Driving Lesson</h5>
                            <p>Tempor erat elitr rebum at clita dolor diam ipsum sit diam amet diam et eos</p>
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i>Beginner</li>
                                <li class="breadcrumb-item small"><i class="fa fa-calendar-alt text-primary me-2"></i>3 Week</li>
                            </ol>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="img/courses-2.jpg" alt="">
                            <div class="courses-overlay">
                                <a class="btn btn-outline-primary border-2" href="">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4">$99</div>
                            <h5 class="mb-3">International Driving</h5>
                            <p>Tempor erat elitr rebum at clita dolor diam ipsum sit diam amet diam et eos</p>
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i>Beginner</li>
                                <li class="breadcrumb-item small"><i class="fa fa-calendar-alt text-primary me-2"></i>3 Week</li>
                            </ol>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="img/courses-3.jpg" alt="">
                            <div class="courses-overlay">
                                <a class="btn btn-outline-primary border-2" href="">Read More</a>
                            </div>
                        </div>
                    </div>
                </div> -->
      <!-- <div class="col-lg-8 my-6 mb-0 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-primary text-center p-5">
                        <h1 class="mb-4">Make Appointment</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="gname" placeholder="Gurdian Name">
                                        <label for="gname">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="gmail" placeholder="Gurdian Email">
                                        <label for="gmail">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="cname" placeholder="Child Name">
                                        <label for="cname">Courses Type</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="cage" placeholder="Child Age">
                                        <label for="cage">Car Type</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
      <!-- </div> -->
    </div>
  </div>
  <!-- Courses End -->


  <!-- Features Start -->
  <!-- <div class="container-xxl py-6">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
          <h6 class="text-primary text-uppercase mb-2">Why Choose Us!</h6>
          <h1 class="display-6 mb-4">Best Driving Training Agency In Your City</h1>
          <p class="mb-5">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
            Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
          <div class="row gy-5 gx-4">
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
              <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0 btn-square bg-primary me-3">
                  <i class="fa fa-check text-white"></i>
                </div>
                <h5 class="mb-0">Fully Licensed</h5>
              </div>
              <span>Magna sea eos sit dolor, ipsum amet ipsum lorem diam eos</span>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
              <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0 btn-square bg-primary me-3">
                  <i class="fa fa-check text-white"></i>
                </div>
                <h5 class="mb-0">Online Tracking</h5>
              </div>
              <span>Magna sea eos sit dolor, ipsum amet ipsum lorem diam eos</span>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
              <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0 btn-square bg-primary me-3">
                  <i class="fa fa-check text-white"></i>
                </div>
                <h5 class="mb-0">Afordable Fee</h5>
              </div>
              <span>Magna sea eos sit dolor, ipsum amet ipsum lorem diam eos</span>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
              <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0 btn-square bg-primary me-3">
                  <i class="fa fa-check text-white"></i>
                </div>
                <h5 class="mb-0">Best Trainers</h5>
              </div>
              <span>Magna sea eos sit dolor, ipsum amet ipsum lorem diam eos</span>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="position-relative overflow-hidden pe-5 pt-5 h-100" style="min-height: 400px;">
            <img class="position-absolute w-100 h-100" src="img/about-1.jpg" alt="" style="object-fit: cover;">
            <img class="position-absolute top-0 end-0 bg-white ps-3 pb-3" src="img/about-2.jpg" alt=""
              style="width: 200px; height: 200px">
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Features End -->


  <!-- Team Start -->
  <div class="container-xxl py-4">
    <div class="container">
      <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h6 class="text-primary text-uppercase mb-2">Meet The Team</h6>
        <h1 class="display-6 mb-4">Lorem ipsum dolor, sit amet</h1>
      </div>
      <div class="row g-0 team-items">
        
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="team-item position-relative">
            <div class="position-relative">
              <img class="img-fluid" src="img/about-1.jpg" alt="">
              <div class="team-social text-center">
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
            <div class="bg-light text-center p-4">
              <h5 class="mt-2">Full Name</h5>
              <span>Trainer</span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="team-item position-relative">
            <div class="position-relative">
              <img class="img-fluid" src="img/team-2.jpg" alt="">
              <div class="team-social text-center">
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
            <div class="bg-light text-center p-4">
              <h5 class="mt-2">Full Name</h5>
              <span>Trainer</span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="team-item position-relative">
            <div class="position-relative">
              <img class="img-fluid" src="img/team-3.jpg" alt="">
              <div class="team-social text-center">
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
            <div class="bg-light text-center p-4">
              <h5 class="mt-2">Full Name</h5>
              <span>Trainer</span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
          <div class="team-item position-relative">
            <div class="position-relative">
              <img class="img-fluid" src="img/team-4.jpg" alt="">
              <div class="team-social text-center">
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
            <div class="bg-light text-center p-4">
              <h5 class="mt-2">Full Name</h5>
              <span>Trainer</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Team End -->

  <!-- Clients Section -->
    <!-- Clients Start -->
<div class="clientSection py-5 mt-5">
    <div class="container">

        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Our Clients</h6>
            <h1 class="text-light display-6 mb-3">Trusted By Our Clients</h1>
             
        </div>

        <div class="owl-carousel client-carousel">

            <div class="client-item">
                <img src="img/clients/clients-1.webp" class="img-fluid" alt="">
            </div>

            <div class="client-item">
                <img src="img/clients/clients-2.webp" class="img-fluid" alt="">
            </div>

            <div class="client-item">
                <img src="img/clients/clients-3.webp" class="img-fluid" alt="">
            </div>

             <div class="client-item">
                <img src="img/clients/clients-4.webp" class="img-fluid" alt="">
            </div>

            <div class="client-item">
                <img src="img/clients/clients-5.webp" class="img-fluid" alt="">
            </div>

            <div class="client-item">
                <img src="img/clients/clients-6.webp" class="img-fluid" alt="">
            </div>

          

        </div>

    </div>
</div>
<!-- Clients End -->


  <!-- Testimonial Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h6 class="text-primary text-uppercase mb-2">Testimonial</h6>
        <h1 class="display-6 mb-4">What Our Clients Say!</h1>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
          <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item text-center">
              <div class="position-relative mb-5">
                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-1.jpg" alt="">
                <div
                  class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                  style="width: 60px; height: 60px;">
                  <i class="fa fa-quote-left fa-2x text-primary"></i>
                </div>
              </div>
              <p class="fs-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem, pariatur obcaecati amet beatae minima quod quae corporis temporibus iste reiciendis at labore distinctio ad cupiditate.</p>
              <hr class="w-25 mx-auto">
              <h5>Client Name</h5>
              <span>Profession</span>
            </div>
            <div class="testimonial-item text-center">
              <div class="position-relative mb-5">
                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-2.jpg" alt="">
                <div
                  class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                  style="width: 60px; height: 60px;">
                  <i class="fa fa-quote-left fa-2x text-primary"></i>
                </div>
              </div>
              <p class="fs-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem, pariatur obcaecati amet beatae minima quod quae corporis temporibus iste reiciendis at labore distinctio ad cupiditate.</p>

              <hr class="w-25 mx-auto">
              <h5>Client Name</h5>
              <span>Profession</span>
            </div>
            <div class="testimonial-item text-center">
              <div class="position-relative mb-5">
                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-3.jpg" alt="">
                <div
                  class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                  style="width: 60px; height: 60px;">
                  <i class="fa fa-quote-left fa-2x text-primary"></i>
                </div>
              </div>
              <p class="fs-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem, pariatur obcaecati amet beatae minima quod quae corporis temporibus iste reiciendis at labore distinctio ad cupiditate.</p>

              <hr class="w-25 mx-auto">
              <h5>Client Name</h5>
              <span>Profession</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonial End -->



  <!-- Footer End -->
 
<?php include 'includes/footer.php'; ?>


  <!-- Copyright End -->


  <!-- Back to Top -->
  
<!-- Get In Touch Modal -->
<div class="modal fade" id="leadModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header" style="background:#0C2B4B;color:white;">
                <!-- <h5 class="modal-title">
                    Get In Touch With Us
                </h5> -->
                <img src="img/about-2.jpeg" alt="" height="50" >
                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <form action="includes/save-lead.php" method="POST">

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Mobile Number</label>
                        <input type="text"
                               class="form-control"
                               name="mobile"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Who Are You?</label>
                        <select class="form-control"
                                name="user_type"
                                required>
                            <option value="">Select</option>
                            <option value="Visitor">Visitor</option>
                            <option value="Student">Student</option>
                            <option value="Business Owner">Business Owner</option>
                            <option value="Hotel Owner">Hotel Owner</option>
                            <option value="Resort Owner">Resort Owner</option>
                            <option value="Associate">Associate</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit"
                            class="btn"
                            style="background:#D4AF37;color:#000;">
                        Submit
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {

   

        setTimeout(function() {

            let leadModal = new bootstrap.Modal(
                document.getElementById('leadModal')
            );

            leadModal.show();

           

        }, 10000); // 10 seconds

    

});
</script>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
  <script>
  $(document).ready(function () {

    $(".client-carousel").owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        smartSpeed: 800,

        nav: false,
        dots: false,

        slideBy: 1,

        responsive: {
            0: {
                items: 2
            },
            576: {
                items: 3
            },
            768: {
                items: 4
            },
            992: {
                items: 5
            }
        }
    });

});
</script>
</body>

</html>