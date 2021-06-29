<?php

require "executeable.php";

class TextFile extends Executeable
{
    public function __debugInfo()
    {
        return "Executeable_TextFile_Path:" . $this->getPath();
    }
}

?>