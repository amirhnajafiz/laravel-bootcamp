<?php

if (isset($_POST['username']))
{

  $filename = '../../data/users.txt';
  $file = null;
  $data = [];

  $file = fopen($filename, 'r');
  $users = explode("\n", fread($file, filesize($filename)));
  fclose($file);

  foreach ($users as $user) 
    $data[] = unserialize($user);

  $file = fopen($filename, 'w');

  for ($i = 0; $i < count($data) - 1; $i++)
    if ($data[$i]['username'] != $_POST['username'])
        fwrite($file, serialize($data[$i]) . "\n");

  fclose($file);

  $user_data = json_decode(file_get_contents('../../data/' . $_POST['username'] . '.txt'), true);
  if ($user_data != NULL)
  {
    foreach(array_keys($user_data) as $contact)
    {
      $newdata = json_decode(file_get_contents('../../data/' . $contact . '.txt'), true);
      unset($newdata[$_POST['username']]);
      file_put_contents('../../data/' . $contact . '.txt', json_encode($newdata));
    }
  }

  unlink('../../data/' . $_POST['username'] . '.txt');

  $content = file_get_contents('../../data/online.txt');
  $content = str_replace("$$--" . $_POST['username'], "", $content);
  file_put_contents('../../data/online.txt', $content);
}

header("Location: ../../SignIn.php");
exit();
?>