<?php
  // First we get the user from our request
  $user = $_GET['user'];

  // Then we get that user contacts
  $contacts = file_get_contents("data/{$user}.txt");

  // After that we get user contacts into a json form then we convert
  // them all into an array.
  $contacts = json_decode($contacts, true);

  $array = [];

  if ($contacts != null) // If user had no contacts we don't iterate the list
  {
    foreach ($contacts as $name => $values) {
      $array[] = $name;
    }
  }

  $contacts = $array;
?>
