<?php
$_SESSION["stress"] = $_POST["stress"];
// $_SESSION["stress"] = (isset($_POST["stress"]) ? $_POST["stress"]:1);
include "ss-moodgetter.php";
?>
