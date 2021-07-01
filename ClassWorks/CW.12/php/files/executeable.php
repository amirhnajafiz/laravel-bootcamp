<?php

require_once "file.php";

/**
 * A file that is not directory and it
 * has actual content.
 * 
 */
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