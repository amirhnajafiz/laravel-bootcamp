<?php

require 'Functions.php';

$data = getUsers();

$flag = false;

foreach ($data as $user) {
  if ($user['username'] == $_POST['username'])
    $flag = true;
}

if (!$flag) {
  header("Location: ../MyChatRoom.php?user={$_POST['sender']}&error=fialedtofinduser");
  exit();
}

$json = json_decode(file_get_contents("../data/{$_POST['sender']}.txt"), true);

if ($json == null || !array_key_exists($_POST['username'], $json)) {
  $json[$_POST['username']] = [];
}

file_put_contents("../data/{$_POST['sender']}.txt", json_encode($json));

header("Location: ../MyChatRoom.php?user={$_POST['sender']}")

?>
