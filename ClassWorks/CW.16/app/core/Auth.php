<?php

namespace app\core;

use app\models\User;

class Auth {
    private static $user = false; 

    public static function init() {

        $id = $_COOKIE['user_id'];
        $type = $_COOKIE['user_type'];
        
        if ($id == null || $type == null)
            return;
        
        self::$user = self::findUser($id, $type);
                
    }

    public static function check() {
        return self::$user !== false;
    }

    public static function findUser($id, $type) {

        $user = User::Do()->select('*', "id='$id' AND type='$type'");

        if ($user == [])
            return false;

        return $user[0];
    }

    public static function getName() {
        if (self::$user === false)
            return false;

        return self::$user['firstname'] . ' ' . self::$user['lastname'];
    }

    public static function getType() {
        if (self::$user === false)
            return false;

        return self::$user['type'];
    }

    public static function getId() {
        if (self::$user === false)
            return false;
            
        return self::$user['id'];
    }
}