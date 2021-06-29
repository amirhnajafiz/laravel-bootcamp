<?php

require_once "file.php";

class Dir extends File
{
    protected $list;
    
    public function __construct($name)
    {
        $this->name = $name;
        $this->list = [];
    }

    public function getList()
    {
        return $this->list;
    }

    public function getDirectoryName($dir)
    {
        $myPath = explode("/", $dir, 2);
        if (count($myPath) == 1)
        {
            $myPath[] = "";
        }
        return $myPath;
    }

    public function addFile($file, $dir = "")
    {
        $myPath = $this->getDirectoryName($dir);
        foreach($this->getList() as $dirs)
        {
            if ($dirs instanceof $this)
            {
                if ($dirs->equals($myPath[0]))
                {

                    $dirs->addFile($file, $myPath[1]);
                    return;
                }
            }
        }
        $this->list[] = $file;
    }

    public function removeFile($name, $dir = "")
    {
        $myPath = $this->getDirectoryName($dir);
        foreach($this->getList() as $dirs)
        {
            if ($dirs instanceof $this)
            {
                if ($dirs->equals($myPath[0]))
                {
                    $dirs->removeFile($name, $myPath[1]);
                    return;
                }
            }
        }
        $index = 0;
        foreach($this->getList() as $file)
        {
            if ($file->equals($name))
            {
                unset($this->list[$index]);
                return;
            }
            $index++;
        }
    }

    public function __debugInfo()
    {
        $temp = [];
        foreach($this->getList() as $file)
        {
            $temp[] = var_export($file, true);
        }
        return ["Directory:" => $this->getName(), "Files:" => count($this->getList()), "In:" => $temp,];
    }
}

?>