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
            $form_errors['fname'] = array();
            $form_errors['lname'] = array();
            $form_errors['number'] = array();
            $form_errors['mail'] = array();
            $request_message = "";
            $store_fname = "";
            $store_lname = "";
            $store_mail = "";
            $store_numb = "";
            $store_mesg = "";

            function validate_request()
            {
                global $form_errors, $store_fname, $store_lname, $store_mail, $store_numb, $store_mesg;

                if (!isset($_GET))
                    return FALSE;
                
                $flag = TRUE;

                $store_mesg = test_input($_GET['message']);
                
                $form_errors['fname'] = array();
                $name_pattern = '/[^A-Za-z]+/';
                $store_fname = $_GET['firstname'];

                if (strlen($_GET['firstname']) < 2)
                {
                    array_push($form_errors['fname'], "First name is too short.");
                    $flag = FALSE;
                }
                
                if (preg_match($name_pattern, $_GET['firstname']))
                {
                    array_push($form_errors['fname'], "First name should contain only letters.");
                    $flag = FALSE;
                    $store_fname = "";
                }

                $form_errors['lname'] = array();
                $store_lname = $_GET['lastname'];

                if (strlen($_GET['lastname']) < 2)
                {
                    array_push($form_errors['lname'], "Last name is too short.");
                    $flag = FALSE;
                }
                
                if (preg_match($name_pattern, $_GET['lastname']))
                {
                    array_push($form_errors['lname'], "Last name should contain only letters.");
                    $flag = FALSE;
                    $store_lname = "";
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
                $request_message = $validate ? "Your request was sent successfully." : "Something is wrong in your informations, please fix the issus.";

                if ($validate)
                    save_to_file();
            }

            function save_to_file()
            {
                $filedata = file_get_contents('./Build/template.html');
                $filedata = str_replace("##USERNAME", $_GET['firstname'] . " " . $_GET['lastname'], $filedata);
                $filedata = str_replace("##EMAIL", $_GET['mail'], $filedata);
                $filedata = str_replace("##PHONE", $_GET['phone'], $filedata);
                $filedata = str_replace("##TITLE", $_GET['firstname'], $filedata);
                $filedata = str_replace("##CONTENT", $_GET['message'], $filedata);

                $myfile = fopen("./Users/" . $_GET['mail'] . ".html", "w");
                fwrite($myfile, $filedata);
                fclose($myfile);
            }

            if(count($_GET) > 0)
                request_send();
        ?>

        <div class="container">
            <div class="content">
                <div class="header">
                    <h1>Contact Us</h1>
                    <p>Curabitur lobortis id lorem id bibendum. Ut id consectetur magna. Quisque volutpat augue enim, pulvinar lobortis nibh lacinia at.</p>
                </div>
                <form action="" method="GET">
                    <div class="content-body">
                        <div class="row">
                            <div class="card half-width left-float">
                                <input type="text" name="firstname" placeholder="First Name *" minlength="2" pattern="[A-Za-z]*" value="<?php echo $store_fname; ?>" required />
                                <?php echo get_errors("fname"); ?>
                            </div>
                            <div class="card half-width right-float">
                                <input type="text" name="lastname" placeholder="Last Name *" minlength="2" pattern="[A-Za-z]*" value="<?php echo $store_lname; ?>" required />
                                <?php echo get_errors("lname"); ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="card half-width left-float">
                                <input type="email" name="mail" placeholder="Email *" value="<?php echo $store_mail; ?>" required />
                                <?php echo get_errors("mail"); ?>
                            </div>
                            <div class="card half-width right-float">
                                <input type="text" name="phone" minlength="11" placeholder="Phone Number" value="<?php echo $store_numb; ?>" required />
                                <?php echo get_errors("number"); ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="card full-width">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" placeholder="Nam porttitor blandit accumsan" required>
                                    <?php echo $store_mesg; ?>
                                </textarea>
                            </div>
                            <div class="card full-width">
                                <span>* Nam porttitor blandit accumsan. Ut vel dictum sem</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="footer">
                        <span><?php echo $request_message; ?></span>
                        <input type="submit" value="SUBMIT MESSAGE" />
                    </div>
                    <div style="text-align:center;">
                        <a href="./store.php">See Store</a>
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
