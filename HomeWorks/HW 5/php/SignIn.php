<?php
  require 'Functions.php';
  require 'Online.php';

  // First we try to find our user, then we send the user to its chatroom
  if (findUser($_GET['username'], md5($_GET['password']))) {
    if (isset(($_GET['rememberme'])))
      if ($_GET['rememberme'] == 'on')
        setcookie('username', $_GET['username'], ['path' => '/Maktab/Chat']);

    if (!isOnline($_GET['username'], '../data/online.txt'))
    {
      setUserOnline($_GET['username']);
      header("Location: ../MyChatRoom.php?user={$_GET['username']}");
      exit();
    }
  } else {
    header('Location: ../SignIn.php?status=notfound');
    exit();
  }

  header('Location: ../SignIn.php?status=duplicate');
?>
