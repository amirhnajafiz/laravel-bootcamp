<?php

namespace mvc\controller;

use mvc\core\Application;

class BaseController
{
    public function render($view, $params = []) 
    {
        return Application::$app->router->renderView($view, $params);
    }
}

?>