<?php
  require 'Functions.php';
  require 'Online.php';

  // First we try to find our user, then we send the user to its chatroom
  if (findUser($_GET['username'], md5($_GET['password']))) {
    if ($_GET['rememberme'] == 'on')
      setcookie('username', $_GET['username'], ['path' => '/Maktab/Chat']);
    
    setUserOnline($_GET['username']);
    header("Location: ../MyChatRoom.php?user={$_GET['username']}");
    exit();
  }

  header('Location: ../SignIn.php?status=notfound');
?>
