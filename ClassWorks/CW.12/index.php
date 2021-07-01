<?php

require_once "php/manager/manager.php";
require "php/utils.php";

$list = getTree('assets/data');
var_dump($list);

$MyManager = new Manager();

$MyManager->loadFiles($list);
var_dump($MyManager);

delTree('assets/data');
$MyManager->makeFiles();

?>