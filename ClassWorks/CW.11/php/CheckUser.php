<?php

function checkUser() {

  if (isset($_COOKIE['username']))
    header("Location: MyChatRoom.php?user={$_COOKIE['username']}");

}
?>
