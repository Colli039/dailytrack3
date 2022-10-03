<!-- Topbar -->
<nav class="navbar navbar-expand navbar-dark bg-light topbar mb-4 static-top shadow">

<div class="navbar-header page-scroll">
  <a class="navbar-brand" href="pdashboard">
      <img src="views/assets/img/logo.png" alt="logo" width="130" height="35" style="margin-left: 20px;"/>
  </a>
</div>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item"><a class="nav-link" href="pdashboard"><span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fa fa-home"></i>  Home</span></a></li>
    <li class="nav-item"><a class="nav-link" href="sjournals"><span class="mr-1 d-none d-lg-inline text-gray-600"><i class="fa fa-book"></i>  Journals</span></a></li>
    <li class="nav-item"><a class="nav-link" href="consultnotes"><span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fa fa-clipboard"></i>  Consultation Notes</span></a></li>
    <li class="nav-item"><a class="nav-link" href="spec-calendar"><span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar</span></a></li>

    <li class="nav-item"><a class="nav-link" href="patlist"><span class="mr-1 d-none d-lg-inline text-gray-600"><i class="fa fa-book"></i>  Patients</span></a></li>
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $_SESSION['specemail'] ?></span>
            <img class="img-profile rounded-circle" src="
            <?php
              //echo 'views/img/users/',$_SESSION['useremail'],'.jpg';
              //elseif ($_SESSION['id'] == 2) echo 'views/img/users/U23/259.jpg';
              // else echo 'views/img/users/default/anonymous.png';
            ?>
            "/>

        </a>

      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown">
                  <a class="dropdown-item text-gray-600" href="spec-profile">
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
