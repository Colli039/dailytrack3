<!-- Topbar -->
<nav class="navbar navbar-expand navbar-dark bg-light topbar mb-4 static-top shadow">

  <ul class="navbar-nav ml-auto">
    <li class="nav-item"><a class="nav-link" href="#"><span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fa fa-home"></i>  Home</span></a></li><!--<span class="slctHomePat inv-btn">-->
    <li class="nav-item"><a class="nav-link" href="#"><span class="mr-2 d-none d-lg-inline text-gray-600"><i class='fa fa-comments'></i>  Messaging</span></a></li>
    <li class="nav-item"><a class="nav-link" href="#"><span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fa fa-book"></i>  Journal</span></a></li>
    <li class="nav-item"><a class="nav-link" href="#"><span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fa fa-book"></i>  Appointment</span></a></li>
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $_SESSION['username'] ?></span>
            <img class="img-profile rounded-circle" src="
            <?php
              if ($_SESSION['username'] == "Colli") echo 'views/img/users/admin/aldebaran.jpg';
              //elseif ($_SESSION['id'] == 2) echo 'views/img/users/U23/259.jpg';
              // else echo 'views/img/users/default/anonymous.png';
            ?>
            "/>

        </a>

      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown">
                  <a class="dropdown-item text-gray-600" href="#">
                      <i class="fa fa-user fa-sm fa-fw mr-2"></i>  Account
                  </a>
                  <a class="dropdown-item text-gray-600" href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                      Logout
                  </a>
              </div>

        <!-- Dropdown - User Information -->

    </li>
  </ul>

</nav>
<!-- End of Topbar -->
