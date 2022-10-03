<div class="container" style="margin-top: 50px; margin-left:-5px">

<form action="euprofi" method="post" style="display:block;">

    <div style="margin: 10px 0;">
    <label for="editFname">First Name:</label>
    <input type="text" name="editFname" style="margin-left: 50px;" value=<?php echo $_SESSION['userfname']?>>
    </div>

    <div style="margin: 10px 0;">
    <label for="editLname">Last Name:</label>
    <input type="text" name="editLname" style="margin-left: 53px;" value=<?php echo $_SESSION['userlname']?>>
    </div>

    <div style="margin: 10px 0;">
    <label for="editCnum">Contact Number:</label>
    <input type="text" name="editCnum" style="margin-left: 10px;" value=<?php echo $_SESSION['usercnum']?>>
    </div>

    <div style="margin: 10px 0;">
    <label for="editBday">Birthday:</label>
    <input type="date" name="editBday" style="margin-left: 67px;" value=<?php echo $_SESSION['userbday']?>>
    </div>

    <div style="margin: 10px 0;">
    <label for="editBday">Sex:</label>
    <select class="form-control" id="editSex" name="editSex" 
    style="width: 30%;" value=<?php echo $_SESSION['usersex']?> required>
      <option value="" selected hidden>Sex</option>
      <option value="0">Male</option>
      <option value="1">Female</option>
      <option value="2">Other</option>
    </select>
    </div>

  <button class="btn-info" style="border-radius:20px; margin: 20px 0;" type="submit" name="submitEdit">Update Profile</button>
</form>

<hr>

<form action="authedit" method="post">
  Email:
  <input type="email" name="editEmail" style="margin: 0 30px 0 15px;" value=<?php echo $_SESSION['useremail']?>>
  Password:
  <input type="password" name="editPassword" style="margin: 0 30px 0 15px;">

  <button class="btn-info" style="border-radius:20px; margin: 20px 0;" type="submit" name="submitEdit">Update Authentication</button>
</form>

<hr>

<form action="newpatient" method="post" style="margin: 10px 0;">
  License Number:
  <input type="text" name="newPCode" style="margin-left: 10px;" placeholder="Type License Number here">
  <button class="btn-info" style="border-radius:20px; margin: 20px 0;" type="submit" name="submitPCode">Connect with Psychiatrist</button>
</form>

<br>


</div>
