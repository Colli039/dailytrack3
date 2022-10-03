<?php
  $idSpec = $_SESSION['id'];
?>

<div class="clearfix"></div>

<div class="content-wrapper">
   <div class="container-fluid">
     <div class="row pt-2 pb-2">
        <div class="col-sm-12">
          <h4 class="page-title">Patient Dashboard Overview</h4>
        </div>
     </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">

            <!-- <div class="card-header float-sm-right">
              <button type="button" class="btn btn-primary btn-round waves-effect waves-light m-1 float-right" onClick="location.href='petadd'"><i class="fa fa-plus"></i><span>&nbsp;ADD PET</span></button>
            </div> -->

            <div class="card-body">
              <div class="table-responsive">
                <table class="display table table-bordered table-hover table-striped patsTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>Patient Name</th>
                        <th>Current Mood</th>
                        <th>Emoticard</th>
                        <th>Patient Appointment</th>
                        <th>Appointment Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      $pets = (new ControllerDashboard)->ctrShowData($idSpec);
                      foreach ($pets as $key => $value) {
                        if ($value["mood"]=='') {
                          $moodstmt='';
                        }else{
                          $moodstmt='<img src="views/assets/img/dashboard/'.$value["mood"].'.jpg">';
                        }
                        echo '<tr>
                                <td>'.$value["username"].'</td>
                                <td>'.$moodstmt.'</td>
                                <td>
                                  <div class="btn-group group-round m-1">
                                    <button class="btnEmoticard"
                                    style="width:200px;padding:10px;margin: 10px -20px 0 0; border-radius: 20px; border: 3px solid #57c4ff;
                                    background-color: white;">
                                    <i class="fas fa-chart-pie"></i> Emoticard</button>
                                    </div>
                                </td>
                                <td>'.$value["appointment"].'</td>

                                <td>
                                  <div class="btn-group group-round m-1">
                                    <button onclick="editAppt('.$value["userid"].')" class="btn-info btnEditAppt"
                                    style="margin: 0 10px;"><i class="fa fa-pen"></i> Edit</button>
                                    <button class="btn-sm btn-danger waves-effect waves-light btnDeleteAppt"><i class="fa fa-trash"></i> Cancel</button>
                                  </div>
                                </td>
                              </tr>';
                        }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>    <!-- row -->

    <div class="overlay toggle-menu"></div>
  </div>        <!-- container-fluid -->
</div>          <!-- content-wrapper -->

<?php
  $deletePet = new ControllerPets();
  $deletePet -> ctrDeletePet();
?>
