<?php
    // First we open the user file to get its messages.
    // If it had no selected user then it would just return an empty array.
    $chat_content = json_decode(file_get_contents("data/{$_GET['user']}.txt"), true);
    if (isset($_GET['chater']))
        $messages = $chat_content[$_GET['chater']] ?? [];
    else
        $messages = [];
?>
