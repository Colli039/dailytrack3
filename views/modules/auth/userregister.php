
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block pams-login"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <img src="views/assets/img/logo.png" alt="logo" style="height:50px;width:180px;">
                                <h4 style="margin:25px 0;color:#00ccbe;font-weight:bold;">User Registration</h4>
                            </div>

                            <?php
                              $auth = new ControllerAuthentication();
                              $register = $auth->ctrRegister();
                            ?>

                              <form role="form" method="post">
<!--Email, password, first name, last name, sex, bday, cnum -->
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="newEmail" name="newEmail" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="newPassword" name="newPassword" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="newFname" name="newFname" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="newLname" name="newLname" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control form-control-user"
                                            id="newBday" name="newBday" placeholder="Birthday" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="newCnum" name="newCnum" placeholder="Contact Number" required>
                                    </div>
                                    <div class="form-group">

                                      <label for="newSex">Sex</label>
                                      <select class="form-control" id="newSex" name="newSex" required>
                                        <option value="" selected hidden>Select a category</option>
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                        <option value="2">Other</option>
                                      </select>
                                    </div>
                                    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                                        async defer>
                                    </script>
                                    <div class="g-recaptcha" data-sitekey="6Le5RZEeAAAAAKEusa174wCpLJxOChTkd22_L48F">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn-info btn-user btn-block">Register</button>
                                </form>
                                <br>
                                <p align="center"><a href="login">Login instead?</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
