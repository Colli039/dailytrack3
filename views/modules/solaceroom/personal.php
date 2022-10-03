<?php

 function ctrAddValues($arrayValues){
  //var_dump('--------------------');
  //var_dump($arrayValues);
  $total=1;
  foreach ($arrayValues as $value) {
    $total+=intval($value);
  }
  return $total;
}

//var_dump('--------------------');
//var_dump($_POST);
$_SESSION["anger"       ] =  (isset($_POST["anger"       ])) ? ctrAddValues($_POST["anger"       ]) : 0;
$_SESSION["anticipation"] =  (isset($_POST["anticipation"])) ? ctrAddValues($_POST["anticipation"]) : 0;
$_SESSION["joy"         ] =  (isset($_POST["joy"         ])) ? ctrAddValues($_POST["joy"         ]) : 0;
$_SESSION["trust"       ] =  (isset($_POST["trust"       ])) ? ctrAddValues($_POST["trust"       ]) : 0;
$_SESSION["fear"        ] =  (isset($_POST["fear"        ])) ? ctrAddValues($_POST["fear"        ]) : 0;
$_SESSION["surprise"    ] =  (isset($_POST["surprise"    ])) ? ctrAddValues($_POST["surprise"    ]) : 0;
$_SESSION["sadness"     ] =  (isset($_POST["sadness"     ])) ? ctrAddValues($_POST["sadness"     ]) : 0;
$_SESSION["disgust"     ] =  (isset($_POST["disgust"     ])) ? ctrAddValues($_POST["disgust"     ]) : 0;

//make foreach statement that adds the values of the array content and store it in the database using model

//var_dump('--------------------');
//var_dump($_SESSION);
//var_dump('---------****----------');
//var_dump($_POST);
include "ss-personal.php";


?>
