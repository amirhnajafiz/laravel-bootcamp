<?php

require_once "php/manager/manager.php";

$MyManager = new Manager();

$MyManager->addTextFile("php.ini", "temp");
$MyManager->addTextFile("functions.php", "temp");
$MyManager->addTextFile("php_config", "temp");
$MyManager->addImgFile("favico.ico", "temp");
$MyManager->addImgFile("logo.svg", "temp");
$MyManager->addDirectory("etc");
$MyManager->addDirectory("usrs");
$MyManager->addDirectory("root");
$MyManager->addDirectory("logs");
$MyManager->addDirectory("host" ,"root");
$MyManager->addTextFile("passwords", "temp" ,"root");
$MyManager->addTextFile("ips", "temp" ,"root/host");

var_dump($MyManager);

$MyManager->removeFile("ips", "root/host");

var_dump($MyManager);

?>