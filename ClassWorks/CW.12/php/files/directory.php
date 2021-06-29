<?php

require_once "file.php";

class Dir extends File
{
    protected $list;
    
    public function __construct($path)
    {
        $this->file_path = $path;
        $this->list = [];
    }

    public function getList()
    {
        return $this->list;
    }

    public function __debugInfo()
    {
        return "Directory_Path:" . $this->getPath();
    }
}

?>