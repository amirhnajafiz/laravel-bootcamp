<?php

require 'Functions.php';

foreach (getUsers() as $user) {

  if ($user['username'] == $_GET['username']) {
    header('Location: ../SignUp.php?status=invalidusername');
    exit();
  }

}


$file = fopen('../data/users.txt', 'a');

$data = [
  "username" => $_GET['username'],
  "password" => md5($_GET['password']),
];

fwrite($file, serialize($data) . "\n");

fopen("../data/{$_GET['username']}.txt", 'w');

header("Location: ../SignIn.php");

?>
