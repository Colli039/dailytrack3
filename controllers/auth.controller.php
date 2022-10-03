<?php
class ControllerAuthentication {
  //initialization of objects
  private $usermodel;
  private $ctrauth;
  //initialization of global variables
  private $counter;
  private $data;
  private $secret_key;
  private $verify;
  private $response;
  private $new;
  private $row_count;
  private $creds;
  private $success;
  private $failure;
  protected $status;
  protected $ipadd;

  public function ctrLogin() {
    //object instantiation
    $this->ctrauth = new ControllerAuthentication();
    $this->usermodel  = new ModelUsers();

    $this->counter = $this->usermodel ->mdlGetFailCounter($this->ctrauth -> ctrGetIP());

    $this->data = array("ipadd"=>$this->ctrauth -> ctrGetIP(), "counter"=>$this->counter);

    if ( isset($_POST["useremail"], $_POST["password"], $_POST["g-recaptcha-response"]) ) {
      $this->secret_key = "6Le5RZEeAAAAANGK5yX_cNRQNUaU5CfPelutFYlN";
      $this->verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='
        . $this->secret_key
        . '&response='.$_POST['g-recaptcha-response']);
      $this->response = json_decode($this->verify);

      $this->new = $this->usermodel ->mdlFindIP($this->ctrauth -> ctrGetIP());
      // if it fails to find a match, add the ip address
      if ($this->new == "") $this->new = $this->usermodel ->mdlAddIP($this->ctrauth -> ctrGetIP());
      else $this->new = $this->usermodel ->mdlUpdateTime($this->ctrauth -> ctrGetIP());
      $this->row_count = $this->usermodel ->mdlGetRowCount();
      if ($this->row_count > 0) {
        $this->creds = $this->usermodel ->mdlGetCredentials($_POST["useremail"]);
        if (!empty($this->creds)) {//if fields are empty
          $this->success = $this->usermodel ->mdlResetFailCounter($this->data);
          if (preg_match('/^[a-zA-Z0-9]+$/', password_verify($_POST["password"], $this->creds["password"]))
              && ($this->response->success)) {//if password and username matches and CAPTCHA is successful
            $this->usermodel  -> mdlUpdateStatus("active", $this->ctrauth -> ctrGetIP());
            session_regenerate_id();
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            $_SESSION["logged_in"] = true;
            $_SESSION["useremail"] = $_POST["useremail"];
            $_SESSION["userfname"] = $_POST["userfname"];
            $_SESSION["userlname"] = $_POST["userlname"];
            $_SESSION["userbday"] = $_POST["userbday"];
            $_SESSION["usercnum"] = $_POST["usercnum"];
            $_SESSION["id"] = $this->creds["id"];
            header("Location: home");
          }
          else {
            // Incorrect password
            $this->ctrauth->ctrFailureHandler();
          }
        }
        else {
          // Incorrect username
          $this->ctrauth->ctrFailureHandler();
        }
      }
    }
    $this->status = $this->usermodel  -> mdlGetStatus($this->ctrauth -> ctrGetIP());
    return $this->status;
  }
  public function ctrSpecLogin() {
    //object instantiation
    $this->ctrauth = new ControllerAuthentication();
    $this->usermodel  = new ModelSpecs();

    $this->counter = $this->usermodel ->mdlGetFailCounter($this->ctrauth -> ctrGetIP());

    $this->data = array("ipadd"=>$this->ctrauth -> ctrGetIP(), "counter"=>$this->counter);

    if ( isset($_POST["specemail"], $_POST["specpassword"], $_POST["g-recaptcha-response"]) ) {
      $this->secret_key = "6Le5RZEeAAAAANGK5yX_cNRQNUaU5CfPelutFYlN";
      $this->verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='
        . $this->secret_key
        . '&response='.$_POST['g-recaptcha-response']);
      $this->response = json_decode($this->verify);

      $this->new = $this->usermodel ->mdlFindIP($this->ctrauth -> ctrGetIP());
      // if it fails to find a match, add the ip address
      if ($this->new == "") $this->new = $this->usermodel ->mdlAddIP($this->ctrauth -> ctrGetIP());
      else $this->new = $this->usermodel ->mdlUpdateTime($this->ctrauth -> ctrGetIP());
      $this->row_count = $this->usermodel ->mdlGetRowCount();
      if ($this->row_count > 0) {
        $this->creds = $this->usermodel ->mdlGetSpecCredentials($_POST["specemail"]);
        if (!empty($this->creds)) {//if fields are empty
          $this->success = $this->usermodel ->mdlResetFailCounter($this->data);
          if (preg_match('/^[a-zA-Z0-9]+$/', password_verify($_POST["specpassword"], $this->creds["specpassword"]))
              && ($this->response->success)) {//if password and username matches and CAPTCHA is successful
            $this->usermodel  -> mdlUpdateStatus("active", $this->ctrauth -> ctrGetIP());
            session_regenerate_id();
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            $_SESSION["logged_in"] = true;
            $_SESSION["specemail"] = $_POST["specemail"];
            $_SESSION["id"] = $this->creds["id"];
            header("Location: pdashboard");
          }
          else {
            // Incorrect password
            $this->ctrauth->ctrFailureHandler();
          }
        }
        else {
          // Incorrect username
          $this->ctrauth->ctrFailureHandler();
        }
      }
    }
    $this->status = $this->usermodel  -> mdlGetStatus($this->ctrauth -> ctrGetIP());
    return $this->status;
  }

  public function ctrRegister() {
    //object instantiation
    $this->ctrauth = new ControllerAuthentication();
    $this->usermodel  = new ModelUsers();

    if ( isset($_POST["newEmail"], $_POST["newPassword"]) ) {
      $this->creds = $this->usermodel ->mdlGetCredentials($_POST["newEmail"]);

      if(empty($this->creds)) {
        $this->data = array("userid"=>(new ControllerUsers)->ctrGetUserid(),
                "useremail"=>$_POST["newEmail"],
                "password"=>password_hash($_POST["newPassword"], PASSWORD_DEFAULT),
                "userfname"=>$_POST["newFname"],
                "userlname"=>$_POST["newLname"],
                "userbday"=>$_POST["newBday"],
                "usercnum"=>$_POST["newCnum"],
                "usersex"=>$_POST["newSex"]
                );
        $answer = $this->usermodel ->mdlAddUser("userauth", $this->data);
        $this->creds = $this->usermodel ->mdlGetCredentials($_POST["newEmail"]);
        session_regenerate_id();
        // Verification success! User has logged-in!
        // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
        $_SESSION["logged_in"] = true;
        $_SESSION["useremail"] = $_POST["newEmail"];
        $_SESSION["id"] = $this->creds['id'];
        //$_SESSION['timestamp'] = time();
        header("Location: home");
      } else {
        echo '<p align="center" style="color:red;">Email already exists.</p>';
      }
      // F2A Array Storage: END
    }
  }
  public function ctrSpecRegister() {
    //object instantiation
    $this->ctrauth = new ControllerAuthentication();
    $this->usermodel  = new ModelSpecs();

    if ( isset($_POST["newEmail"], $_POST["newPassword"]) ) {
      $this->creds = $this->usermodel ->mdlGetSpecCredentials($_POST["newEmail"]);

      if(empty($this->creds)) {
        $this->data = array("specid"=>(new ControllerSpecs)->ctrGetSpecid(),
                "specemail"=>$_POST["newEmail"],
                "specpassword"=>password_hash($_POST["newPassword"], PASSWORD_DEFAULT),
                "specfname"=>$_POST["newFname"],
                "speclname"=>$_POST["newLname"],
                "specbday"=>$_POST["newBday"],
                "speccnum"=>$_POST["newCnum"],
                "specsex"=>$_POST["newSex"],
                "speclnum"=>$_POST["newLnum"],
                "speclexp"=>$_POST["newLnumex"]
                );
        $answer = $this->usermodel ->mdlAddSpec("specauth", $this->data);
        $this->creds = $this->usermodel ->mdlGetSpecCredentials($_POST["newEmail"]);
        session_regenerate_id();
        // Verification success! User has logged-in!
        // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
        $_SESSION["logged_in"] = true;
        $_SESSION["specemail"] = $_POST["newEmail"];
        $_SESSION["id"] = $this->creds['id'];
        //$_SESSION['timestamp'] = time();
        header("Location: home-spec");
      } else {
        echo '<p align="center" style="color:red;">Email already exists.</p>';
      }
      // F2A Array Storage: END
    }
  }

  public function ctrForgotPassword() {
    // Send useremail for password reset
  }

  public function ctrFailureHandler() {
    $this->ctrauth = new ControllerAuthentication();
    $this->usermodel = new ModelUsers();

    $this->failure = $this->usermodel ->mdlPlusFailCounter($this->data);
    $this->counter = $this->usermodel ->mdlGetFailCounter($this->ctrauth -> ctrGetIP());
    if ($this->counter == 4) echo '<p align="center" style="color:red;">Incorrect useremail and/or password! You only have 1 try remaining.</p>';
    else if ($this->counter == 5) {
      $this->usermodel  -> mdlUpdateStatus("locked", $this->ctrauth -> ctrGetIP());
      echo '<p align="center" style="color:red;">Incorrect useremail and/or password! Please try again after 15 minutes.</p>';
    }
    else {
      echo '<p align="center" style="color:red;">Incorrect useremail and/or password! You only have '. 5 - $this->counter . ' tries remaining.</p>';
    }
  }

  public function ctrGetFailCounter(){
    $this->ctrauth = new ControllerAuthentication();

    $this->counter = $this->usermodel ->mdlGetFailCounter($this->ctrauth -> ctrGetIP());
    return $this->counter;
  }

  public function ctrResetFailCounter(){
    $this->ctrauth = new ControllerAuthentication();

    $this->counter = $this->usermodel -> mdlGetFailCounter($this->ctrauth -> ctrGetIP());
    $this->data = array("ipadd"=>$this->ctrauth -> ctrGetIP(), "counter"=>$this->counter);
    $this->success = $this->usermodel -> mdlResetFailCounter($this->data);
    return $this->success;
  }

  public function ctrUpdateStatus($status) {
    $this->ctrauth = new ControllerAuthentication();
    $this->usermodel = new ModelUsers();
    $this->usermodel -> mdlUpdateStatus($status, $this->ctrauth -> ctrGetIP());
  }

  public function ctrGetIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) $this->ipadd = $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) $this->ipadd = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else $this->ipadd = $_SERVER['REMOTE_ADDR'];
    return $this->ipadd;
  }

}
