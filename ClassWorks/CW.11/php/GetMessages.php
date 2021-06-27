<?php
    $messages = json_decode(file_get_contents("data/{$_GET['user']}.txt"), true)[$_GET['chater']] ?? [];
    $messages = array_slice($messages, -3);
?>
