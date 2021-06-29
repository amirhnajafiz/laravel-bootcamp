<?php

require_once "php/files/file.php";
require_once "php/files/executeable.php";
require_once "php/files/directory.php";
require_once "php/files/textfile.php";
require_once "php/files/imgfile.php";

class Manager
{
    protected $list;

    public function __construct()
    {
        $this->list = [];
    }

    public function addTextFile($name, $content)
    {
        $this->list[] = new TextFile($name, $content);
    }

    public function addImgFile($name, $content)
    {
        $this->list[] = new ImgFile($name, $content);
    }

    public function addDirectory($name)
    {
        $this->list[] = new Dir($name);
    }

    public function getList($filter = 'File')
    {
        $temp = [];
        foreach($this->list as $singleFile)
        {
            if ($singleFile instanceof $filter)
            {
                $temp[] = $singleFile;
            }
        }
        return $temp;
    }
}

?>