<?php

$user = $_GET['user'];

$contacts = file_get_contents("data/{$user}.txt");

$contacts = json_decode($contacts, true);

$array = [];

foreach ($contacts as $name => $values) {
  $array[] = $name;
}

$contacts = $array;

?>
