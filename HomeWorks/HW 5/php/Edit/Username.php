<?php

if (isset($_POST['username']))
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
        
        for ($i = 0; $i < count($data); $i++)
        {
            if ($data[$i]['username'] == $_POST['olduser'])
            {
                $data[$i]['username'] = $_POST['username'];
            }
        }
      }
    }
    else {
      $file = fopen($filename, 'w');
    }
    fclose($file);

    $file = fopen($filename, 'w');
    foreach ($data as $single)
        fwrite($file, serialize($single) . "\n");
    fclose($file);

    $user_data = json_decode(file_get_contents('../../data/' . $_POST['olduser'] . '.txt'), true);
    foreach(array_keys($user_data) as $contact)
    {
        $newdata = json_decode(file_get_contents('../../data/' . $contact . '.txt'), true);
        $newdata[$_POST['username']] = $newdata[$_POST['olduser']];
        unlink($newdata[$_POST['olduser']]);
        file_put_contents('../../data/' . $contact . '.txt', json_encode($newdata));
    }

    file_put_contents('../../data/' . $_POST['username'] . '.txt', json_encode($user_data));
    unlink('../../data/' . $_POST['olduser'] . '.txt');

    $content = file_get_contents('../../data/online.txt');
    $content = str_replace($_POST['olduser'], $_POST['username'], $content);
    file_put_contents('../../data/online.txt', $content);
}

header("Location: ../../MyChatRoom.php?user=" . $_POST['username']);

?>