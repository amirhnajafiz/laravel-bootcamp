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

    public function addFile($file)
    {
        $this->list[] = $file;
    }

    public function removeFile($name)
    {
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
        return ["Directory:" => $this->getName(), "Files:" => count($this->getList()),];
    }
}

?>