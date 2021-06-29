<?php

require "file.php";

class Executeable extends File
{
    protected $content;
    
    public function __construct($path, $content)
    {
        $this->file_path = $path;
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function __debugInfo()
    {
        return "Executeable_Path:" . $this->getPath();
    }
}

?>