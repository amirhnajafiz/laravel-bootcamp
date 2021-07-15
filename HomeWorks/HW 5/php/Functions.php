<?php

  /**
   * This method gets a list of users that are Signedup before.
   * @return data the list of current users in system
   * 
   */
  function getUsers() {
    $filename = '../data/users.txt';
    $file = null;
    $data = [];
    if (file_exists($filename))
    {
      $file = fopen($filename, 'r');
      if (filesize($filename) != 0)
      {
        $users = explode("\n", fread($file, filesize($filename)));
        foreach ($users as $user) 
          $data[] = unserialize($user);
      }
    }
    else {
      $file = fopen($filename, 'w');
    }
    fclose($file);
    return $data;
  }

  /**
   * This method searchs in existing users to check username
   * existance and password validation.
   * @param username is the username in our chatroom
   * @param password is the password of the user
   * @return boolean returns true or false based on the user data
   */
  function findUser($username, $password) {
    foreach (getUsers() as $user) {
      if ($user['username'] == $username && $user['password'] == $password)
        return true;
    }
    return false;
  }

?>
