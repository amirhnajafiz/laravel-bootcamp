<?php

require_once "executeable.php";

/**
 * ImgFile class represents a single image file.
 * 
 */
class ImgFile extends Executeable
{
    static $TYPES = ['png', 'jpg', 'svg', 'ico', 'gif', 'jpge'];

    public static function isImage($input)
    {
        foreach(self::$TYPES as $type)
        {
            if ($type == $input)
                return true;
        }
        return false;
    }

    public function __debugInfo()
    {
        return ["Executeable_ImageFile:" => $this->getName(),];
    }
}

?>