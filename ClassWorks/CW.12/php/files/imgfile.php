<?php

require_once "executeable.php";

class ImgFile extends Executeable
{
    public function __debugInfo()
    {
        return ["Executeable_ImageFile:" => $this->getName(),];
    }
}

?>