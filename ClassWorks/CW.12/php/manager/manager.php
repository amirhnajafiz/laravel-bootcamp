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

    public function addTextFile($name, $content, $dir = "")
    {
        $myPath = explode("/", $dir, 2);
        if (count($myPath) == 1)
        {
            $myPath[] = "";
        }
        foreach($this->getList("Dir") as $dirs)
        {
            if ($dirs->equals($myPath[0]))
            {
                $dirs->addFile(new TextFile($name, $content), $myPath[1]);
                return;
            }
        }
        $this->list[] = new TextFile($name, $content);
    }

    public function addImgFile($name, $content, $dir = "")
    {
        $myPath = explode("/", $dir, 2);
        if (count($myPath) == 1)
        {
            $myPath[] = "";
        }
        foreach($this->getList("Dir") as $dirs)
        {
            if ($dirs->equals($myPath[0]))
            {
                $dirs->addFile(new ImgFile($name, $content), $myPath[1]);
                return;
            }
        }
        $this->list[] = new ImgFile($name, $content);
    }

    public function addDirectory($name, $dir = "")
    {
        $myPath = explode("/", $dir, 2);
        if (count($myPath) == 1)
        {
            $myPath[] = "";
        }
        foreach($this->getList("Dir") as $dirs)
        {
            if ($dirs->equals($myPath[0]))
            {
                $dirs->addFile(new Dir($name), $myPath[1]);
                return;
            }
        }
        $this->list[] = new Dir($name);
    }

    public function removeFile($name, $dir = "")
    {
        $myPath = explode("/", $dir, 2);
        if (count($myPath) == 1)
        {
            $myPath[] = "";
        }
        foreach($this->getList("Dir") as $dirs)
        {
            if ($dirs->equals($myPath[0]))
            {
                $dirs->removeFile($name, $myPath[1]);
                return;
            }
        }
        for ($i = 0; $i < count($this->list); $i++)
        {
            if ($this->list[$i]->equals($name))
            {
                unset($this->list[$i]);
                return;
            }
        }
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