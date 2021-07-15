<?php

  /**
   * This method checks if user is already logged in our not.
   * If it was, then it sends it to the User Chatroom.
   * 
   */
  function checkUser() {
    if (isset($_COOKIE['username']))
      header("Location: MyChatRoom.php?user={$_COOKIE['username']}");
  }
?>
