<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>

  <!-- Add your site or application content here -->
  <?php
    function valid_name()
    {
      global $form_errors;
      $flag = true;
      $name_pattern = '/[A-za-z0-9]*/';

      if ( strlen($_REQUEST['user_name']) < 3 )
      {
        array_push($form_errors, "User name too short");
      }

      if ( !preg_match($name_pattern, $_REQUEST['user_name']) )
      {
        array_push($form_errors, "User name does not match the pattern");
        $flag = false;
      }

      return $flag;
    }

    function valid_password()
    {
      global $form_errors;
      $flag = true;
      $letters_pattern = '/[A-za-z]{4,}/';
      $number_pattern = '/[0-9]+/';
      $special_pattern = '/[~`!@#$%^&*()-+]+/';

      if ( strlen($_REQUEST['password']) < 6 )
      {
        array_push($form_errors, "Password is too short");
      }

      if ( !preg_match($letters_pattern, $_REQUEST['password']) )
      {
        array_push($form_errors, "Password must contain capital or small letters");
        $flag = false;
      }
      
      if ( !preg_match($number_pattern, $_REQUEST['password']) )
      {
        array_push($form_errors, "Password must contain at least one number");
        $flag = false;
      }
      
      if ( !preg_match($special_pattern, $_REQUEST['password']) )
      {
        array_push($form_errors, "Password must contain at least one special character");
        $flag = false;
      }

      return $flag;
    }

    function valid_email()
    {
      global $form_errors;
      $flag = true;
      $email_pattern = '/^\S+@\S+\.\S+$/';

      if ( !preg_match($email_pattern, $_REQUEST['email']) )
      {
        array_push($form_errors, "Wrong email format");
        $flag = false;
      }

      return $flag;
    }

    function checkValidation()
    {
      global $store_name, $store_mail, $store_pass;

      if ( isset($_REQUEST) )
      {
        if ( isset($_REQUEST['user_name']) )
          if ( valid_name() )
            $store_name = $_REQUEST['user_name'];
          else  
            $store_name = "";
        if ( isset($_REQUEST['email'] ) )
          if ( valid_email() )
            $store_mail = $_REQUEST['email'];
          else  
            $store_mail = "";
        if ( isset($_REQUEST['password'] ) )
          if ( valid_password() )
            $store_pass = $_REQUEST['password'];
          else  
            $store_pass = "";
      }
    }
  ?>

  <?php
    $form_errors = [];
    $store_name = "";
    $store_mail = "";
    $store_pass = "";
    checkValidation();
  ?>

  <div>
    <form action="" method="get">
      <input type="text" name="user_name" placeholder="Username" minlength="3" pattern="[A-Za-z0-9]*" value="<?php echo $store_name ?>" />
      <input type="password" name="password" placeholder="Password" minlength="6" value="<?php echo $store_pass ?>" />
      <input type="email" name="email" placeholder="Email" value="<?php echo $store_mail ?>" />
      <input type="submit" name="submit" />
    </form>
  </div>

  <?php
    if (count($form_errors) > 0)
      foreach($form_errors as $error_msg)
        echo $error_msg . "<br />";
  ?>
  
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
