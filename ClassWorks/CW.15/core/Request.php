<?php

namespace app\core;

class Request
{

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'];
        $pos = strpos($path, '?');
        
        if ($pos === false) {
            return $path;
        }

        return substr($path, 0, $pos);
    }

    public function getInputs()
    {
        $data = [];
        
        foreach ($_POST as $param_name => $param_val) 
            $data[$param_name] = $param_val;

        return $data;
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}