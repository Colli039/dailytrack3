
<div class="clearfix"></div>

<div class="content-wrapper">
  <div class="container-fluid">
   <div class="row pt-2 pb-2">
     <div class="col-sm-12">
  	    <h4 class="page-title">New Appointment</h4>

     </div>
   </div>
<!--
    <div class="row">
      <div class="col-lg-12"> -->
        <form role="form" method="post" autocomplete="nope">
          <div class="card">
            <div class="card-body">
                 <!-- <div class="table-responsive"> -->
                   <table class="table table-bordered" width="auto" style="text-align: center;" cellspacing="0">
                     <thead>
                     </thead>
                     <tbody>
                       <tr>
                         <th>Patient Name</th>
                         <th><div class="col-sm-7 form-group">
                            <input type="text" class="form-control" id="patName" name="patname" value="<?php echo $_SESSION['useremail'] ?>">
                         </div></th>
                       </tr>
                       <tr>
                         <th>Specialist Name</th>
                         <th>
                           <div class="col-sm-7 form-group">
                           <input type="text" class="form-control" id="specName" name="specname" value="<?php echo 'Dr. Adelyn Sia' ?>">
                         </div></th>
                       </tr>
                       <tr>
                         <th>Session Date(Calendar)</th>
                         <th>
                           <div class="col-sm-7 form-group">
                           <input type="date" class="form-control" id="sesDate" placeholder="yyyy-mm-dd" name="date" autocomplete="nope">
                         </div></th>
                       </tr>
                       <tr>
                         <th>Session Time</th>
                         <th>
                           <div class="col-sm-7 form-group input-group">
                              <!-- <div class="col-md-8" id="timepicker"> -->
                           <label for="timeStart" style="margin: 5px 10px 0 0">Time Start </label>&nbsp;

                               <input type="time" id="timeStart" name="timeStart" class="form-control"/>&nbsp;&nbsp;&nbsp;


                           <label for="timeEnd" style="margin: 5px 10px 0 10px">Time End</label>&nbsp;
                             <input type="time" id="timeEnd" name="timeEnd" class="form-control"/>

                             <!-- </div> -->
                         </div>
                       </th>
                       </tr>
                       <tr>
                         <th>Session Venue</th>
                         <th>
                           <div class="col-sm-7 form-group">
                             <div class="form-group clearfix">
                              <div class="icheck-primary d-inline input-group">
                                <input type="radio" id="radioPrimary1" name="venue" value="0" checked>
                                <label for="radioPrimary1">
                                  <i class="fas fa-store-alt"></i>
                                  Clinic
                                </label>
                              </div>&nbsp;&nbsp;&nbsp;&nbsp;
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="venue"  value="1" name="patAppts">
                                <label for="radioPrimary2">
                                  <i class="fas fa-headset"></i>
                                  Video Call
                                </label>
                              </div>
                           </div>
                         </th>
                       </tr>
                       <!-- <tr>
                         <th>Proof of Payment</th>
                         <th>
                              <div id="actions" class="col-sm-4">
                                  <div class="btn-group w-100">

                                    <span class="btn btn-primary">
                                      <i class="fas fa-plus"></i>
                                      <span>Upload receipt</span>
                                    </span>
                                  </div>
                          </div>
                        </th>
                      </tr> -->
                      <!-- <span class="btn btn-success col fileinput-button"> -->
                     </tbody>
                     <tfoot>
                     </tfoot>
                   </table>
                 </div>
               <!-- </div> -->
               <div id="actions" style="text-align: center; float: right; margin-bottom: 20px;" >
                 <button type="submit" class="btn btn-primary">
                   <span>Confirm</span>
                 </button>
                 <span class="btn btn-outline-info" style="margin:5px 10px;">
                   <span><a href="home">
                     Cancel</a></span>
                 </span>
               </div>

             </div>
           </form>
           <?php
             $createAppt = new ControllerUsers();
             $createAppt -> ctrCreateAppt();

             $_SESSION["patname"] = $_POST["patname"];
             $_SESSION["specname"] = $_POST["specname"];
             $_SESSION["date"] = $_POST["date"];
             $_SESSION["timeStart"] = $_POST["timeStart"];
             $_SESSION["timeEnd"] = $_POST["timeEnd"];
             $_SESSION["venue"] = $_POST["venue"];
            vardump($_SESSION)
           ?>
           </div>
         </div>
       <!-- </div>
     </div> -->

     <!-- FAILED ATTEMPT TO TRY GET THE USER NAME USING ID -->
     <!-- <?php
       $idPat = $_GET['id'];

       $pat = (new Connection)->connect()->query("SELECT * FROM userauth WHERE id = $idPat")->fetch(PDO::FETCH_ASSOC);

       $username = $pat['userfname'].$pat['userlname'];
     ?> -->
