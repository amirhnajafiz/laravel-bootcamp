<?php
  require 'Functions.php';

  // First we try to find our user, then we send the user to its chatroom
  if (findUser($_GET['username'], md5($_GET['password']))) {
    if ($_GET['rememberme'] == 'on')
      setcookie('username', $_GET['username'], ['path' => '/Maktab/Chat']);
      
    header("Location: ../MyChatRoom.php?user={$_GET['username']}");
    exit();
  }

  header('Location: ../SignIn.php?status=notfound');
?>
