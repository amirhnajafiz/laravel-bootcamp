<?php

require_once "../vendor/autoload.php";

use app\core\Application;


$app = new Application();

$app->router->get('/', function() {
    return "Hello World";
});

$app->router->get('/about', 'about');

$app->router->get('/login', 'login');

$app->router->post('/login', function() {
    return "handle post request";
});

$app->router->post('/login', function($inputs) {
    return "handle post request " . count($inputs);
});

$app->router->get('/contact', function() {
    return "Contact";
});

$app->run();

# TODO: تمرین شماره ۵
/*
    یک پکیج خارجی هم به پروژه اضافه کنید و در جایی از آن استفاده کنید.
    پکیج دلخواه بوده و نحوه استفاده با خودتان است.
*/