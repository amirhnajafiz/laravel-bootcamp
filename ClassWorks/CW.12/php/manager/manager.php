<?php

require_once "php/files/file.php";
require_once "php/files/executeable.php";
require_once "php/files/directory.php";
require_once "php/files/textfile.php";
require_once "php/files/imgfile.php";

class Manager
{
    protected $root;

    public function __construct()
    {
        $this->root = new Dir("/");
    }

    public function addTextFile($name, $content, $dir = "")
    {
        $this->root->addFile(new TextFile($name, $content), $dir);
    }

    public function addImgFile($name, $content, $dir = "")
    {
        $this->root->addFile(new ImgFile($name, $content), $dir);
    }

    public function addDirectory($name, $dir = "")
    {
        $this->root->addFile(new Dir($name), $dir);
    }

    public function removeFile($name, $dir = "")
    {
        $this->root->removeFile($name, $dir);
    }

    public function getList($filter = 'File', $dir = "")
    {
        return $this->root->getList($filter, $dir);
    }

    public function makeFiles()
    {
        $this->root->createFiles('assets/data');
    }

    public function __debugInfo()
    {
        return ["Type" => "Root", "Content" => var_export($this->root, true)];
    }
}

?>