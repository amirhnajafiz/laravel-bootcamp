<?php

/**
 * File class is the superclass of all of our 
 * files ( text, image, dir, ...)
 * 
 */
class File
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function __debugInfo()
    {
        return ["File:" => $this->getName(),];
    }

    public function equals($name)
    {
        return $this->name === $name;
    }
}

?>