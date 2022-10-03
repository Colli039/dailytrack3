<?php
  $idPat = $_SESSION['id'];

  $_SESSION['userfname'] = implode((new Connection)->connect()->query("SELECT userfname FROM userauth WHERE id = $idPat")->fetch(PDO::FETCH_ASSOC));
  $_SESSION['userlname'] = implode((new Connection)->connect()->query("SELECT userlname FROM userauth WHERE id = $idPat")->fetch(PDO::FETCH_ASSOC));
  $_SESSION['usersex'] = implode((new Connection)->connect()->query("SELECT usersex FROM userauth WHERE id = $idPat")->fetch(PDO::FETCH_ASSOC));
  $pat = (new Connection)->connect()->query("SELECT userfname, userlname FROM userauth WHERE id = $idPat")->fetch(PDO::FETCH_ASSOC);
  $_SESSION['userbday'] = implode((new Connection)->connect()->query("SELECT userbday FROM userauth WHERE id = $idPat")->fetch(PDO::FETCH_ASSOC));
  $_SESSION['usercnum'] = implode((new Connection)->connect()->query("SELECT usercnum FROM userauth WHERE id = $idPat")->fetch(PDO::FETCH_ASSOC));
  $username = implode(' ',$pat);
?>
<ul class="navbar-nav sidebar accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a href="edit-uprofile" type="button" class="align-items-right"><i class="fa fa-pen icon" style="text-align:right;cursor:pointer"></i></a>


        <div class="sidebar-brand-icon d-flex align-items-center justify-content-center" style="margin-top: 30px;">
            <img class="rounded-circle" src="
            <?php
              echo 'views/img/users/default/anonymous.png';
            ?>" width="150"/>
        </div>
        <!-- <div class="sidebar-brand-text mx-3 align-items-center justify-content-center"><?php echo $_SESSION['userfname'];?></div> -->


    <br><hr class="sidebar-divider">

    <h5 class="profileName"><?php echo $username ?></h4><br>

    <div class="sidebar-heading" style="margin-left: -10px;margin-bottom:5px;">General Info</div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item"><i class="far fa-envelope icon" ></i>  <?php echo $_SESSION['useremail']?></li>
    <li class="nav-item"><i class="fa fa-phone-alt icon"></i>  <?php echo $_SESSION['usercnum'] ?></li>
    <!-- <li class="nav-item"><i class="fas fa-map-marker-alt icon"></i>  <?php echo'Brgy. Cabug, Bacolod City'?></li> -->
    <li class="nav-item"><i class="fas fa-birthday-cake"></i>  <?php echo $_SESSION['userbday']?></li>

    <!-- <br><hr class="sidebar-divider">
    <div class="sidebar-heading">Bio</div>
    <li class="nav-item"><?php echo'I like chonkers'?>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


</ul>
<!-- End of Sidebar -->
