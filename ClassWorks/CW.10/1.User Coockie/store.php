<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
    <?php
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
    ?>
<body>
    <div>
        <div class="row m-0 p-5">
            <div class="col-6" style="padding: 20px;">
                <?php echo getMail() ?>
            </div>
            <div class="col-6" style="padding: 20px;">
                <?php echo getPhone() ?>
            </div>
        </div>
    </div>
</body>
</html>