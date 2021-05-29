<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>

        <?php
            $form_errors = array();
            $request_message = "";
            $store_name = "";
            $store_mail = "";
            $store_numb = "";
            $store_mesg = "";

            function validate_request()
            {
                global $form_errors, $store_name, $store_mail, $store_numb, $store_mesg;

                if (!isset($_GET))
                    return FALSE;
                
                $flag = TRUE;

                $store_mesg = test_input($_GET['message']);
                
                $form_errors['name'] = array();
                $name_pattern = '/[^A-Za-z]+/';
                $store_name = $_GET['fullname'];

                if (strlen($_GET['fullname']) < 6)
                {
                    array_push($form_errors['name'], "Name is too short.");
                    $flag = FALSE;
                }
                
                if (preg_match($name_pattern, $_GET['fullname']))
                {
                    array_push($form_errors['name'], "Name should contain only letters.");
                    $flag = FALSE;
                    $store_name = "";
                }
                
                $form_errors['number'] = array();
                $store_numb = $_GET['phone'];
                
                if ( !(strlen($_GET['phone']) > 10 && substr($_GET['phone'], 0, 2) == "09" ) )
                {
                    array_push($form_errors['number'], "Phone number should start with '09' and be more than 11 numbers.");
                    $flag = FALSE;
                    $store_numb = "";
                }
                
                $form_errors['mail'] = array();
                $mail_pattern = '/^\S+@\S+\.\S+$/';
                $store_mail = $_GET['mail'];

                if (!preg_match($mail_pattern, $_GET['mail']))
                {
                    array_push($form_errors['mail'], "Email has incorrect format.");
                    $flag = FALSE;
                    $store_mail = "";
                }

                return $flag;
            }

            function get_errors($parameter)
            {
                global $form_errors;

                if (!isset($_GET))
                    return;

                $string = "<ul>";
                foreach($form_errors[$parameter] as $mesg)
                {
                    $string = $string . "<li>" . $mesg . "</li>";
                }
                $string = $string . "</ul>";
                return $string;
            }

            function test_input($data) 
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            function request_send()
            {
                global $request_message;

                if (!isset($_GET))
                    return;

                $validate = validate_request();
                $request_message = $validate ? "Your request was sent successfully." : "Something is wrong in your informations, please fix them.";
            }

            if(isset($_GET))
                request_send();
        ?>

        <div class="container">
            <div class="content">
                <div class="header">
                    <h1>CONTACT US</h1>
                    <p>Nam porttitor blandit accumsan. Ut vel dictum sem, a pretium dui, In malesuada</p>
                </div>
                <form action="" method="GET">
                    <div class="content-body">
                        <div class="row">
                            <div class="card third-width">
                                <label for="full-name">FULL NAME</label>
                                <input type="text" name="fullname" id="full-name" minlength="6" pattern="[A-Za-z]*" value="<?php echo $store_name; ?>" required />
                                <?php echo get_errors("name"); ?>
                            </div>
                            <div class="card third-width">
                                <label for="phone">PHONE</label>
                                <input type="text" name="phone" id="phone" minlength="11" value="<?php echo $store_numb; ?>" required />
                                <?php echo get_errors("number"); ?>
                            </div>
                            <div class="card third-width">
                                <label for="email">EMAIL</label>
                                <input type="email" name="mail" id="email" value="<?php echo $store_mail; ?>" required />
                                <?php echo get_errors("mail"); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card half-width">
                                <label>LEOREM IPSUM</label>
                                <select name="leorem-ipsum">
                                    <option value="" disabled selected>Please select</option>
                                    <option value="leorem">LEOREM</option>
                                    <option value="ipsum">IPSUM</option>
                                </select>
                            </div>
                            <div class="card half-width">
                                <label>IPSUM LEOREM</label>
                                <select name="ipsum-leorem">
                                    <option value="" disabled selected>Please select</option>
                                    <option value="ipsum">IPSUM</option>
                                    <option value="leorem">LEOREM</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card full-width">
                                <label for="message">MESSAGE</label>
                                <textarea id="message" name="message" placeholder="Nam porttitor blandit accumsan">
                                    <?php echo $store_mesg; ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <span><?php echo $request_message; ?></span>
                        <input type="submit" value="SUBMIT" />
                    </div>
                </form>
            </div>
        </div>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
