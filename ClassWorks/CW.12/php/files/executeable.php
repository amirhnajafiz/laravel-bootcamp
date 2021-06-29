<?php

require_once "file.php";

class Executeable extends File
{
    protected $content;
    
    public function __construct($name, $content)
    {
        $this->name = $name;
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function __debugInfo()
    {
        return ["Executable:" => $this->getName(),];
    }
}

?>