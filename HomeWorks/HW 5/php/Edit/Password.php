<?php

if (isset($_POST['password']))
{
    $filename = '../../data/users.txt';
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
        
        for ($i = 0; $i < count($data) - 1; $i++)
        {
            if ($data[$i]['username'] == $_POST['username'])
            {
              $data[$i]['password'] = md5($_POST['password']);
            }
        }
      }
    }
    else {
      $file = fopen($filename, 'w');
    }
    fclose($file);

    $file = fopen($filename, 'w');
    for ($i = 0; $i < count($data) - 1; $i++)
      fwrite($file, serialize($data[$i]) . "\n");
    fclose($file);
}

header("Location: ../../MyChatRoom.php?user=" . $_POST['username']);

?>