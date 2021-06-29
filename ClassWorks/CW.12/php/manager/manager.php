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

    public function addTextFile($path, $content)
    {
        $this->list[] = new TextFile($path, $content);
    }

    public function addImgFile($path, $content)
    {
        $this->list[] = new ImgFile($path, $content);
    }

    public function addDirectory($path)
    {
        $this->list[] = new Dir($path);
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