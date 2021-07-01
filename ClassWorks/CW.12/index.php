<?php

require_once "php/manager/manager.php";
require "php/utils.php";

$list = getTree('assets/data');

$MyManager = new Manager();

$MyManager->loadFiles($list);

// Enter your inputs in here
// =========================
$out = $MyManager->search("te");
var_dump($out);
// =========================

delTree('assets/data/');
$MyManager->makeFiles();

?>