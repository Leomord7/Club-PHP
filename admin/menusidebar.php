<aside class="main-sidebar sidebar-dark-primary side-bar-bg elevation-4">
      <!-- Brand Logo -->
      <!-- <a href="index3.html" class="brand-link">
        <img src="../images/<?= $user_data['admin_profile'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
      </a> -->

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../img/about-1.jpeg" class="img-circle w-50" alt="User Image">
          </div>
          <div class="info">
            <!-- <a href="#" class="d-block"><?= $user_data['fullname']  ?></a> -->
            <!-- <a href="#" class="d-block">Hi</a> -->

          </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="index.php?slidersetting=true" class="nav-link ">
                <i class="nav-icon fa fa-camera"></i>
                <p>
                  Slider
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?slidersetting=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      Add slider

                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="index.php?viewslider=true" class="nav-link ">
                    <i class="nav-icon  fa fa-list-ul"></i>
                    <p>
                      View slider

                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="index.php?aboutsetting=true" class="nav-link ">
                <i class="nav-icon fa fa-question-circle"></i>
                <p>
                  About

                </p>
              </a>

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
            
            <!-- <li class="nav-item menu-open">
              <a href="index.php?videosetting=true" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Video
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a> -->
              <!-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?videosetting=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      Add video

                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="index.php?viewvideo=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      View video

                    </p>
                  </a>
                </li>
              </ul> -->
            <!-- </li> -->
             <li class="nav-item">
              <a href="index.php?viewmember=true" class="nav-link ">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Member users

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?viewassociate=true" class="nav-link ">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  Associate uses

                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?contactsetting=true" class="nav-link ">
                <i class="nav-icon fa fa-info"></i>
                <p>
                  Contact

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?sitesetting=true" class="nav-link ">
                <i class="nav-icon fa fa-cog"></i>
                <p>
                  Site Setting

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
            <li class="nav-item menu-open">
              <a href="index.php?staffsetting=true" class="nav-link ">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Staff
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?staffsetting=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      Add Staff

                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="index.php?viewstaff=true" class="nav-link ">
                    <i class="nav-icon fa fa-list-ul"></i>
                    <p>
                      View Staff

                    </p>
                  </a>
                </li>
              </ul>

            </li>




          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


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