<?php

class File
{
    protected $file_path;

    public function __construct($path)
    {
        $this->file_path = $path;
    }

    public function getPath()
    {
        return $this->file_path;
    }

    public function __debugInfo()
    {
        return "File_Path:" . $this->getPath();
    }
}

?>