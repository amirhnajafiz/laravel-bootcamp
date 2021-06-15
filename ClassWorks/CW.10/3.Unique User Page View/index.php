<!DOCTYPE html>
<?php
    session_start();
   
    if (!isset($_SESSION['viewed_home']))
    {
        if(isset($_SESSION['views_home']))
            $_SESSION['views_home'] = $_SESSION['views_home'] + 1;
        else 
            $_SESSION['views_home'] = 1;
        $_SESSION['viewed_home'] = 1;
    }

?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <button type="button" class="btn btn-primary d-block" style="display: block;">Views: <span class="badge"><?php echo $_SESSION['views_home'] ?></span><button>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="blank.php">Blank</a>
            </li>
            <li class="list-group-item">
                <a href="contact.php">Contact</a>
            </li>
        </ul>
    </body>
</html>