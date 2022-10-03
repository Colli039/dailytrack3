<?php
//  echo 'anger:'. $_SESSION["anger"];
// echo '<br>anticipation:'. $_SESSION["anticipation"];
//  echo 'joy:'. $_SESSION["joy"];
// echo 'fear:'. $_SESSION["fear"];
//  echo 'trust:'. $_SESSION["trust"];
//  echo 'surprise:'. $_SESSION["surprise"];
//  echo 'sadness:'. $_SESSION["sadness"];
//  echo 'disgust:'. $_SESSION["disgust"];
//
//
//
//   echo 'strategies:'. $_SESSION["strats"];
//
//   echo '<br> stress:'. $_SESSION["stress"];
//   echo '<br> mood:'. $_SESSION["item"];
//stepstones table:
//distress, mood, copingstrat


//keywords table
// var_dump($_SESSION);
$keywords = (new ControllerStepStones)->ctrAddKeywords($_SESSION["id"]);
$stepstones = (new ControllerStepStones)->ctrAddStressMood($_SESSION["id"]);

$anger        = '';
$anticipation = '';
$joy          = '';
$trust        = '';
$fear         = '';
$surprise     = '';
$sadness      = '';
$disgust      = '';
try
{
  $pdo = (new Connection)->connect();
  $stmt = $pdo->prepare("SELECT * FROM `keywords` ORDER BY `keywords`.`keywordid` DESC LIMIT 1");
  $stmt -> execute();
  while ($row = $stmt->fetch())
  {
    $data['anger'       ] = $row["anger"];
    $data['anticipation'] = $row["anticipation"];
    $data['joy'         ] = $row["joy"];
    $data['trust'       ] = $row["trust"];
    $data['fear'        ] = $row["fear"];
    $data['surprise'    ] = $row["surprise"];
    $data['sadness'     ] = $row["sadness"];
    $data['disgust'     ] = $row["disgust"];
  }

}
catch(PDOException $e)
{
  die("ERROR: Could not able to execute $stmt. " . $e->getMessage());
}
include ("emoticard/chart.php");
?>
