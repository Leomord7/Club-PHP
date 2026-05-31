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