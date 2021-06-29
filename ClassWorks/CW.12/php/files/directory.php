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

    public function __debugInfo()
    {
        return ["Directory:" => $this->getName(),];
    }
}

?>