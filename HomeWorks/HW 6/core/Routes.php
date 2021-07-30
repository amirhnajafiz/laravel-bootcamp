<?php

namespace mvc\core;

use mvc\core\App;

class Routes
{
    public static function getRoutes()
    {
        $app = App::get_instance();

        // Write your routes here
        $app->router->get('/', 'home');
        $app->router->get('/sign_up', 'sign_up');
        $app->router->get('/login', 'login');
    }
}

?>