<?php

function getUsers() {
  $filename = '../data/users.txt';

  $file = fopen($filename, 'r');
  $users = explode("\n", fread($file, filesize($filename)));
  $data = [];

  foreach ($users as $user) 
    $data[] = unserialize($user);

  fclose($file);

  return $data;

}

function findUser($username, $password) {

  foreach (getUsers() as $user) {

    if ($user['username'] == $username && $user['password'] == $password)
      return true;

  }

  return false;
}

?>
