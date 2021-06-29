<?php

require_once "php/manager/manager.php";

$MyManager = new Manager();

$MyManager->addTextFile("here", "temp");
$MyManager->addImgFile("there", "temp");
$MyManager->addDirectory("all");

foreach($MyManager->getList() as $singleFile)
{
    var_dump($singleFile);
}

?>