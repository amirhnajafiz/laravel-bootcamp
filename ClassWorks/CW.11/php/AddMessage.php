<?php

function addMessage($filename, $to, $message, $time, bool $sender) {

  $json = json_decode(file_get_contents($filename), true);

  if ($json == null || !array_key_exists($to, $json)) {
    $json[$to] = [];
  }

  $json[$to][] = [
    'message' => $message,
    'time' => time(),
    'sender' => $sender,
  ];

  file_put_contents($filename, json_encode($json));

}

?>
