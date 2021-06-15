<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<?php
    function setUserInformation()
    {
        if (!isset($_GET['email']))
            return;
        
        setcookie("EMAIL", $_GET['email'], time() + 3600, "/");
        setcookie("PHONE", $_GET['phone'], time() + 3600, "/");
    }

    function getMail()
    {
        if (!isset($_COOKIE["EMAIL"]))
        {
            return "No emails yet.";
        } else {
            return $_COOKIE["EMAIL"];
        }
    }

    function getPhone()
    {
        if (!isset($_COOKIE["PHONE"]))
        {
            return "No phones yet.";
        } else {
            return $_COOKIE["PHONE"];
        }
    }

    if (!isset($_COOKIE["EMAIL"]))
    {
        setUserInformation();
    }
?>
<body>
    <div class="container m-0 m-auto p-0 w-100 pt-5">
        <form action="" method="GET">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="phone">Password</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number">
            </div>
            <input type="submit" value="Send" class="btn btn-primary" />
        </form>
        <div class="row m-0 p-0">
            <div class="col-6">
                <?php echo getMail() ?>
            </div>
            <div class="col-6">
                <?php echo getPhone() ?>
            </div>
        </div>
        <a href="store.php">Click</a>  
    </div>
</body>
</html>