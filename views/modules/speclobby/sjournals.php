
<div class="row pt-2 pb-2">
   <div class="col-lg-12">
     <div style="justify-content: space-between">
       <h4 class="page-title" style="display:inline-block">Patient Journals</h4>
     </div>

<?php
  $idSpec = $_SESSION['id'];
?>
<section id="sidebar-patlist">
  <div class="row">
    <div class="col-md-12">
      <div class="card">

        <!-- <div class="card-header float-sm-right">
          <button type="button" class="btn btn-primary btn-round waves-effect waves-light m-1 float-right" onClick="location.href='petadd'"><i class="fa fa-plus"></i><span>&nbsp;ADD PET</span></button>
        </div> -->

        <div class="card-body">
          <div class="table-responsive">
            <table class="display table table-bordered table-hover table-striped patsList" width="70%" cellspacing="0">
              <thead>
                  <tr>
                    <th>Patients List</th>
                  </tr>
              </thead>
              <tbody>
                <?php

                  $patlist = (new ControllerList)->ctrShowPatientData($idSpec);
                  foreach ($patlist as $key => $value) {
                    echo '<tr>
                            <td>
                              <div class="btn-group group-round m-1">
                                <button class="btnJournalList btnList"
                                style="border-color: #57c4ff" idPat="'.$value["userid"].'">
                                '.$value["username"].'</button>
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
          </div> <!-- patient list: END -->

      </div>
    </div>
  </div>    <!-- row -->
</section>
<section>
  <div class="card" style="height:80vh;width:70%">
    <div class="card-body">
      <?php
      try
      {
        $pdo = (new Connection)->connect();
        $stmt = $pdo->prepare("SELECT * FROM `patients` WHERE userid = :idUser");
        $stmt->bindParam(":idUser", $_GET["idPat"], PDO::PARAM_INT);
        $stmt -> execute();
        while ($row = $stmt->fetch())
        {
          $data['userid'] = $row["userid"];
          $data['patcode'] = $row["patcode"];
        }

      }
      catch(PDOException $e)
      {
        die("ERROR: Could not able to execute $stmt. " . $e->getMessage());
      }
      echo 'Patient Code: '.$data['patcode'];
      include ("./solaceroom/emoticard/mini.php");
      ?>
      <div class="container chart">
          <canvas id="emoChart"></canvas>
      </div>
    </div>
  </div>
</section>
