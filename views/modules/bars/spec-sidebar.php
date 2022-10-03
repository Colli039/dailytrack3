<?php $id = new ControllerUsers();
$usermail = $_SESSION['specemail'];
      $display = $id->ctrGetUserIdEmail($usermail);

        $idSpec = $_SESSION['id'];

        $_SESSION['specsex'] = implode((new Connection)->connect()->query("SELECT specsex FROM specauth WHERE id = $idSpec")->fetch(PDO::FETCH_ASSOC));
        $spec = (new Connection)->connect()->query("SELECT specfname, speclname FROM specauth WHERE id = $idSpec")->fetch(PDO::FETCH_ASSOC);
        $_SESSION['specbday'] = implode((new Connection)->connect()->query("SELECT specbday FROM specauth WHERE id = $idSpec")->fetch(PDO::FETCH_ASSOC));
        $_SESSION['speccnum'] = implode((new Connection)->connect()->query("SELECT speccnum FROM specauth WHERE id = $idSpec")->fetch(PDO::FETCH_ASSOC));
        $specname = implode(' ',$spec);
      ?>

<ul class="navbar-nav sidebar accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <i class="fa fa-pen icon" href="#" style="text-align:right;margin-right:10px; margin-top:20px;cursor:pointer"></i>

        <div class="sidebar-brand-icon d-flex align-items-center justify-content-center">
            <img class="rounded-circle" src="
            <?php
              echo 'views/img/users/',$_GET['specfname'],'.jpg';
            ?>" width="150"/>
        </div>
        <div class="sidebar-brand-text mx-3 align-items-center justify-content-center"><?php echo $specname;?></div>


    <br><hr class="sidebar-divider">
    <div class="sidebar-heading">General Info</div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item"><i class="far fa-envelope icon" ></i>
      <?php echo $_SESSION['specemail']?></li>
    <li class="nav-item"><i class="fa fa-phone-alt icon"></i> <?php echo $_SESSION['speccnum']?></li>
    <li class="nav-item"><i class="fas fa-map-marker-alt icon"></i> <?php echo'Brgy. Cabug, Bacolod City'?></li>
    <li class="nav-item"><i class="fas fa-birthday-cake"></i> <?php echo'Nov. 13, 2000'?></li>

    <!-- <br><hr class="sidebar-divider">
    <div class="sidebar-heading">Bio</div>
    <li class="nav-item"><?php echo'I like chonkers'?>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


</ul>
<!-- End of Sidebar -->
