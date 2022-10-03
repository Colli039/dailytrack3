
<div class="row justify-content-center">

<div class="col-xl-5 col-lg-6 col-md-5">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12" style="align-items: center;">
                    <div class="p-5">
                        <div class="text-center">
                            <img src="views/assets/img/logo.png" alt="logo" style="height:50px;width:180px;">
                            <h4 style="margin:25px 0;color:#00ccbe;font-weight:bold;">Specialist Log In</h4>
                        </div>


                            <?php
                              $auth = new ControllerAuthentication();
                              $login = $auth->ctrSpecLogin();

                              if ($login == "locked") {
                                echo '<form role="form" method="post">
                                  <div class="form-group">
                                      <input type="email" class="form-control form-control-user"
                                          id="specemail" name="specemail" placeholder="Email" disabled>
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control form-control-user"
                                          id="specpassword" name="specpassword" placeholder="Password" disabled>
                                  </div>
                                  <button type="submit" class="btn-primary btn-user btn-block" disabled>Login</button>
                                  </form>
                                  <br>
                                  <p align="center"><a href="register">Are you a new user?</a></p>
                                  <script src="views/js/restrict.js"></script>
                                  ';
                                }
                              else {
                                echo '<form role="form" method="post">

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                            id="specemail" name="specemail" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="specpassword" name="specpassword" placeholder="Password" required>
                                    </div>
                                    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                                        async defer>
                                    </script>
                                    <div class="g-recaptcha" data-sitekey="6Le5RZEeAAAAAKEusa174wCpLJxOChTkd22_L48F" style="margin-left:20px;">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn-info btn-user btn-block" style="border-radius:20px;width:50%;margin:0 auto;">Login</button>
                                </form>
                                <br>
                                <p align="center"><a href="sregister">Register as Specialist</a></p>
                                <p align="center"><a href="login">Login as a Regular User</a></p>';
                              }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
