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

foreach($MyManager->getList('Dir') as $singleFile)
{
    var_dump($singleFile);
}

foreach($MyManager->getList('TextFile') as $singleFile)
{
    var_dump($singleFile);
}

foreach($MyManager->getList('ImgFile') as $singleFile)
{
    var_dump($singleFile);
}

foreach($MyManager->getList('Executeable') as $singleFile)
{
    var_dump($singleFile);
}

foreach($MyManager->getList() as $singleFile)
{
    var_dump($singleFile);
}

$MyManager->removeFile("/");

foreach($MyManager->getList('Dir') as $singleFile)
{
    var_dump($singleFile);
}

?>