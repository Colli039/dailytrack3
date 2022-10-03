<?php
$bytes    = random_bytes(4);
$newPatCode =  bin2hex($bytes);

$newpat = (new ControllerSpecs)->ctrAddPatCode($newPatCode);
