<?php

$_SESSION["patname"] = $_POST["patname"];
$_SESSION["specname"] = $_POST["specname"];
$_SESSION["date"] = $_POST["date"];
$_SESSION["timeStart"] = $_POST["timeStart"];
$_SESSION["timeEnd"] = $_POST["timeEnd"];
$_SESSION["venue"] = $_POST["venue"];

include("pat-appts.php") ?>
