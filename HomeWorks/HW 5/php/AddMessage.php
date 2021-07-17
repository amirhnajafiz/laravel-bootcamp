<?php

  /**
   * This function adds a new message to both user and dist files.
   * @param filename is the username
   * @param to is the destination of message
   * @param message is the content body
   * @param time is the time of the message
   * @param sender to check if the user is sender or seciver
   */
  function addMessage($filename, $to, $message, $time, bool $sender, bool $isFile = false) {

    $json = json_decode(file_get_contents($filename), true);

    if ($json == null || !array_key_exists($to, $json)) {
      $json[$to] = [];
    }

    $json[$to][] = [
      'message' => $message,
      'time' => time(),
      'sender' => $sender,
      'isFile' => $isFile
    ];

    file_put_contents($filename, json_encode($json));

  }
?>
