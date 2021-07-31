<?php

namespace app\models;

use app\core\Model;

class Book extends Model {
    protected static $instance = null;
    
    public static function Do() {

        if (self::$instance == null)
            self::$instance = new Book('books');

        return self::$instance;
    }
}