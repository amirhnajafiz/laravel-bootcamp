<?php

namespace app\models;

use app\core\Model;

class User extends Model {
    
    public static function Do() {

        if (self::$instance == null)
            self::$instance = new User('users');

        return self::$instance;
    }
}