<div class="container">
<?php
$venue;
switch ($_SESSION["venue"]) {
  case '0':
    $venue= "Clinic";
    break;

  default:
    $venue= "Video Call";
    break;
} ?>
<h4>Latest Appointment</h4>
  <div class="container-row">

    <p><?php echo $_SESSION["date"]."<br>".
      $_SESSION["specname"].": ".$venue."<br>".
        $_SESSION["timeStart"]." - ".$_SESSION["timeEnd"]

    ?>

      <button class="btnNewAppt">New Appointment</button>
  </div>
  </div>
