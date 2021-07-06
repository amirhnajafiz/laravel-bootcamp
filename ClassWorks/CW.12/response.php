<?php

require_once "php/manager/manager.php";
require "php/utils.php";

$list = getTree('assets/data');

$MyManager = new Manager();

$MyManager->loadFiles($list);

// Enter your inputs in here
// =========================
$input = $_GET;

if ($input['type'] == 'txt')
{
    $MyManager->addTextFile($input['name'], $input['content'], $input['dir']);
}
if ($input['type'] == 'img')
{
    $MyManager->addImgFile($input['name'], $input['content'], $input['dir']);
}
if ($input['type'] == 'dir')
{
    $MyManager->addDirectory($input['name'], $input['dir']);
}
// =========================

delTree('assets/data/');
$MyManager->makeFiles();

header('Location: index.php');

?>