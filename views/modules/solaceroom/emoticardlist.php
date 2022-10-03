<?php
  $idUser = $_SESSION['id'];
?>
<section id="sidebar-emoticard">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">

        <!-- <div class="card-header float-sm-right">
          <button type="button" class="btn btn-primary btn-round waves-effect waves-light m-1 float-right" onClick="location.href='petadd'"><i class="fa fa-plus"></i><span>&nbsp;ADD PET</span></button>
        </div> -->

        <div class="card-body">
          <div class="table-responsive">
            <table class="display table table-bordered table-hover table-striped emoteTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                    <th>Emoticard List</th>
                  </tr>
              </thead>
              <tbody>
                <?php

                  $pets = (new ControllerList)->ctrShowEmoteData($idUser);
                  foreach ($pets as $key => $value) {
                    $date = date("M jS, Y",strtotime($value["datestime"]));
                    $time = date("h:i A",strtotime($value["datestime"]));
                    echo '<tr>
                            <td>
                              <div class="btn-group group-round m-1">
                                <button class="btnEmoticardList"
                                style="width:20rem;padding:10px; border-radius: 20px; border: 3px solid #57c4ff;
                                background-color: white;" idEmote="'.$value["keywordid"].'">
                                '.$date.' - '.$time.'</button>
                                </div>
                            </td>
                          </tr>';
                    }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>    <!-- row -->
</section>
<section id="main-emoticard">
  <div class="card" style="width:70%; height:80vh; display:inline-block;">
    <?php

    try
    {
      $pdo = (new Connection)->connect();
      $stmt = $pdo->prepare("SELECT * FROM `keywords` kw LEFT JOIN `stepstones` step ON kw.datetime=step.datetime WHERE keywordid = :idkeyword;");
      $stmt->bindParam(":idkeyword", $_GET["idEmote"], PDO::PARAM_INT);
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

        $data['datetimeEmote'] = $row["datetime"];
        $_SESSION['stress'] = $row["ssdistress"];
        $_SESSION['strats'   ] = $row["copingstrat"];
        $_SESSION['moodValue'   ] = $row["ssmood"];
      }
    }
    catch(PDOException $e)
    {
      die("ERROR: Could not able to execute $stmt. " . $e->getMessage());
    }
    // $dataEmote = array(
    //   array('anger', 'anticipation', 'joy', 'trust', 'fear', 'surprise', 'sadness', 'disgust'),
    //   array($data['anger'], $data['anticipation'], $data['joy'], $data['trust'], $data['fear'], $data['surprise'], $data['sadness'], $data['disgust'])
    // );
    $emoteDate = date("M jS, Y",strtotime($data["datetimeEmote"]));
    $emoteTime = date("h:i A",strtotime($data["datetimeEmote"]));
    echo $emoteDate.' - '.$emoteTime;
    include ("emoticard/mini.php");
    ?>
    <div class="container chart">
        <canvas id="emoChart"></canvas>
    </div>
    <div>
      Stress Level: <?php echo $_SESSION['stress'];?>
      Mood: <?php echo $_SESSION['mood'];?>
    </div>
  </div>
</section>
