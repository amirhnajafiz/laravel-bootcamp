<?php
    require 'Online.php';
    setUserOffline($_GET['username']);
    header('Location: ../SignIn.php?status=exit');
    exit();
?>