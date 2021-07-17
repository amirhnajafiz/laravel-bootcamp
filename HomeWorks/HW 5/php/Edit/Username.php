<?php

if (isset($_POST['username']))
{
  if ($_POST['olduser'] == $_POST['username'])
  {
    header("Location: ../../MyChatRoom.php?user=" . $_POST['username']);
    exit();
  }

  $filename = '../../data/users.txt';
  $file = null;
  $data = [];

  $file = fopen($filename, 'r');
  $users = explode("\n", fread($file, filesize($filename)));
  fclose($file);

  foreach ($users as $user) 
    $data[] = unserialize($user);
  
  for ($i = 0; $i < count($data) - 1; $i++)
  {
    if ($data[$i]['username'] == $_POST['olduser'])
    {
      $data[$i]['username'] = $_POST['username'];
    }
  }

  $file = fopen($filename, 'w');
  for ($i = 0; $i < count($data) - 1; $i++)
    fwrite($file, serialize($data[$i]) . "\n");
  fclose($file);

  $user_data = json_decode(file_get_contents('../../data/' . $_POST['olduser'] . '.txt'), true);
  if ($user_data != NULL)
  {
    foreach(array_keys($user_data) as $contact)
    {
      $newdata = json_decode(file_get_contents('../../data/' . $contact . '.txt'), true);
      $newdata[$_POST['username']] = [];
      if ($newdata[$_POST['olduser']] != NULL)
      {
        foreach($newdata[$_POST['olduser']] as $item)
          $newdata[$_POST['username']][] = $item;
      }
      unset($newdata[$_POST['olduser']]);
      file_put_contents('../../data/' . $contact . '.txt', json_encode($newdata));
    }
    file_put_contents('../../data/' . $_POST['username'] . '.txt', json_encode($user_data));
  } else {
    fopen('../../data/' . $_POST['username'] . '.txt', 'w');
  }

  unlink('../../data/' . $_POST['olduser'] . '.txt');

  $content = file_get_contents('../../data/online.txt');
  $content = str_replace($_POST['olduser'], $_POST['username'], $content);
  file_put_contents('../../data/online.txt', $content);
}

header("Location: ../../MyChatRoom.php?user=" . $_POST['username']);
exit();
?>