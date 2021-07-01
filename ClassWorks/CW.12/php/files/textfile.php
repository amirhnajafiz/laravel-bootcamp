<?php

require_once "executeable.php";

/**
 * TextFile class represents that all files that are
 * not image.
 * 
 */
class TextFile extends Executeable
{
    public function __debugInfo()
    {
        return ["Executeable_TextFile:" => $this->getName(),];
    }
}

?>