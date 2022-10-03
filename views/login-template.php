<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Raleway|Lato" as="style">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway|Lato">
    <link rel="stylesheet" href="views/assets/css/aeza.css">

    <?php
      include "modules/title.php";
    ?>

    <!-- Logo -->
    <link rel="icon" href="views/assets/img/icon.png" type="image/x-icon">

    <!-- Custom styles for this template -->
    <link href="views/assets/css/sb-admin-2.min.css" rel="stylesheet">
    
</head>

<body style="background-color: #00ccbe;">

    <div class="container">

        <?php
        if (isset($_GET["route"])){
          switch ($_GET["route"]) {
            case 'home':
              include "modules/auth/login.php";
              break;
            case 'register':
              include "modules/auth/userregister.php";
              break;
            case 'unlock':
              include "modules/auth/unlock.php";
              break;
            case 'sregister':
              include "modules/auth/sregister.php";
              break;
            case 'slogin':
              include "modules/auth/slogin.php";
              break;
            case 'loginland':
              include "modules/auth/loginland.php";
              break;
            default:
              include "modules/auth/login.php";
              break;
        }

        }
        else {
          include "modules/auth/login.php";
        }
        ?>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="views/assets/vendor/jquery/jquery.min.js"></script>
    <script src="views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="views/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="views/assets/js/sb-admin-2.min.js"></script>
    <script src="views/js/auth.js"></script>

    <!-- CAPTCHA SCRIPT -->
    <!-- <script src="views/js/captcha.js"></script> -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Le5RZEeAAAAAKEusa174wCpLJxOChTkd22_L48F'
        });
      };
    </script>

</body>

</html>
