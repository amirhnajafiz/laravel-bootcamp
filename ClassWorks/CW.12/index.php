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
$MyManager->addDirectory("/");
$MyManager->addDirectory("logs");

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

?>