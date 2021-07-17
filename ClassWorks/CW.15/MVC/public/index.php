<?php

require_once "../vendor/autoload.php";

use app\core\Application;

// spl_autoload_register(function ($class_name) {
//     require_once "../core/$class_name.php";
// });

$app = new Application();

$app->router->get('/', function() {
    return "Hello World";
});

$app->router->get('/about', 'about');

$app->router->get('/login', 'login');

// TODO: تمرین ۲
// $app->router->post('/login', function() {
//     return "handle post request";
// });

// TODO: امتیازی
// $app->router->post('/login', function($inputs) {
//     return "handle post request " . count($inputs);
// });

$app->router->get('/contact', function() {
    return "Contact";
});

$app->run();