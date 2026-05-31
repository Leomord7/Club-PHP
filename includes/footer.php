 <?php
$settingQuery = mysqli_query($conn,"SELECT * FROM settings LIMIT 1");
$setting = mysqli_fetch_assoc($settingQuery);
?>

<style>
.floating-whatsapp{
    position:fixed;
    bottom:25px;
    left:25px;
    width:60px;
    height:60px;
    background:#25D366;
    color:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
    z-index:9999;
    text-decoration:none;
    box-shadow:0 4px 15px rgba(0,0,0,.3);
}

.floating-call{
    position:fixed;
    bottom:95px;
    left:25px;
    width:60px;
    height:60px;
    background:#0C2B4B;
    color:#D4AF37;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    z-index:9999;
    text-decoration:none;
    box-shadow:0 4px 15px rgba(0,0,0,.3);
}

.floating-whatsapp:hover,
.floating-call:hover{
    color:#fff;
    transform:scale(1.08);
    transition:.3s;
}
</style>
 
 <footer class="club-footer py-4">
    <div class="container text-center">

      <!-- Navigation -->
      <ul class="nav justify-content-center mb-3">
        <li class="nav-item">
          <a class="nav-link footer-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link footer-link" href="about.php">About Us</a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link footer-link" href="gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link footer-link" href="member-registration.php">Memeber Registration</a>
        </li>
         <li class="nav-item">
          <a class="nav-link footer-link" href="associate-registration.php">Associate Registration</a>
        </li>
      </ul>

      <!-- Center Social Icons -->
      <div class="mb-3">

    <a href="<?= $setting['facebook']; ?>"
       target="_blank"
       class="footer-icon">
        <i class="fab fa-facebook-f"></i>
    </a>

    <a href="<?= $setting['instagram']; ?>"
       target="_blank"
       class="footer-icon">
        <i class="fab fa-instagram"></i>
    </a>

    <a href="<?= $setting['linkedin']; ?>"
       target="_blank"
       class="footer-icon">
        <i class="fab fa-linkedin-in"></i>
    </a>

    <a href="<?= $setting['twitter']; ?>"
       target="_blank"
       class="footer-icon">
        <i class="fab fa-twitter"></i>
    </a>

</div>

      <hr class="footer-divider">

      <div class="row align-items-center">
        <div class="col-md-12 text-center">
          <a href="https://dempirellp.in/">
          <p class="mb-0 text-white">
            © <span class="text-primary"> D-Empirellp.</span> All Rights Reserved.
          </p>
          </a>
        </div>
      </div>

    </div>

    <!-- Right Bottom Icons -->
    
  </footer>

   <!-- WhatsApp -->
<a href="https://wa.me/91<?= $setting['phone']; ?>"
   class="floating-whatsapp"
   target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- Call -->
<a href="tel:<?= $setting['phone']; ?>"
   class="floating-call">
    <i class="fas fa-phone-alt"></i>
</a>

  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

  <script>
    document.addEventListener('contextmenu', function (e) {
    e.preventDefault();
});

document.addEventListener('keydown', function (e) {

    // Ctrl + Shift + I (Inspect)
    if (e.ctrlKey && e.shiftKey && e.key === 'I') {
        e.preventDefault();
    }

    // Ctrl + Shift + J (Console)
    if (e.ctrlKey && e.shiftKey && e.key === 'J') {
        e.preventDefault();
    }

    // Ctrl + U (View Source)
    if (e.ctrlKey && e.key === 'U') {
        e.preventDefault();
    }
});
  </script>