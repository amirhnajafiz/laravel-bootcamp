<?php
  require 'Functions.php';

  // First we check for the username that it should be unique
  foreach (getUsers() as $user) {
    if ($user['username'] == $_POST['username']) {
      header('Location: ../Edit.php?status=invalidusername&user=' . $_POST['username']);
      exit();
    }
  }

  // If the username was valid we save the user information into 
  // a file and save the chats of our user.
  $file = fopen('../data/users.txt', 'a');

  $data = [
    "username" => $_POST['username'],
    "password" => md5($_POST['password']),
  ];

  fwrite($file, serialize($data) . "\n");
  fopen("../data/{$_POST['username']}.txt", 'w');

  header("Location: ../MyChatRoom.php?user={$_GET['username']}");
  exit();
?>
