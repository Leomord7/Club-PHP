<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
        <img src="img/clublogo.png" alt="Logo" height="100">
    </a>

    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">

        <div class="navbar-nav ms-auto p-4 p-lg-0">

            <a href="index.php"
                class="nav-item nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>">
                Home
            </a>

            <a href="about.php"
                class="nav-item nav-link <?= ($currentPage == 'about.php') ? 'active' : '' ?>">
                About
            </a>

            <a href="gallery.php"
                class="nav-item nav-link <?= ($currentPage == 'gallery.php') ? 'active' : '' ?>">
                Gallery
            </a>

            <div class="nav-item dropdown">

                <a href="#"
                    class="nav-link dropdown-toggle <?= ($currentPage == 'member-registration.php' || $currentPage == 'associate-registration.php') ? 'active' : '' ?>"
                    data-bs-toggle="dropdown">

                    Registration
                </a>

                <div class="dropdown-menu bg-light m-0">

                    <a href="member-registration.php"
                        class="dropdown-item">
                        Member Registration
                    </a>

                    <a href="associate-registration.php"
                        class="dropdown-item">
                        Associate Registration
                    </a>

                </div>

            </div>

        </div>

        <a href="contact.php" class="btn btn-primary py-4 px-lg-5 text-dark d-none d-lg-block">
            Contact us
            <i class="fa fa-arrow-right ms-3"></i>
        </a>

    </div>
</nav>