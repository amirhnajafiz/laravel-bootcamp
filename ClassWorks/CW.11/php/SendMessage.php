<?php
    require 'AddMessage.php';

    // Add the message to both sender and reciver
    addMessage("../data/{$_POST['sender']}.txt", $_POST['to'], $_POST['message'], time(), true);
    addMessage("../data/{$_POST['to']}.txt", $_POST['sender'], $_POST['message'], time(), false);

    header("Location: ../MyChatRoom.php?user={$_POST['sender']}&chater={$_POST['to']}")
?>
