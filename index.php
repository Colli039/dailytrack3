<?php
session_start();
ob_start();

//for main interfaces
if ( isset($_SESSION['id']) && isset($_SESSION['useremail']) ) {
  require_once "controllers/template.controller.php";
  require_once "controllers/auth.controller.php";

  require_once "controllers/pets.controller.php";
  require_once "controllers/users.controller.php";
  require_once "controllers/specialists.controller.php";
  require_once "controllers/steppingstones.controller.php";
  require_once "controllers/list.controller.php";

  require_once "models/pets.model.php";
  require_once "models/users.model.php";
  require_once "models/changelog.model.php";
  require_once "models/specialists.model.php";
  require_once "models/steppingstones.model.php";
  require_once "models/list.model.php";

  $template = new ControllerTemplate();
  $template -> ctrTemplate();

}
//for login interface
else if ( isset($_SESSION['id']) && isset($_SESSION['specemail']) ) {
  require_once "controllers/template.controller.php";
  require_once "controllers/auth.controller.php";

  require_once "controllers/pets.controller.php";
  require_once "controllers/users.controller.php";
  require_once "controllers/specialists.controller.php";
  require_once "controllers/dashboard.controller.php";
  require_once "controllers/list.controller.php";

  require_once "models/pets.model.php";
  require_once "models/users.model.php";
  require_once "models/changelog.model.php";
  require_once "models/specialists.model.php";
  require_once "models/dashboard.model.php";
  require_once "models/list.model.php";
  $template = new ControllerTemplate();
  $template -> ctrTemplate();

}
else
{
  require_once "models/users.model.php";
  require_once "models/specialists.model.php";

  require_once "controllers/users.controller.php";
  require_once "controllers/specialists.controller.php";

  require_once "controllers/auth.controller.php";
  require_once "controllers/logintemplate.controller.php";

  $logintemplate = new ControllerLoginTemplate();
  $logintemplate -> ctrLoginTemplate();
}
