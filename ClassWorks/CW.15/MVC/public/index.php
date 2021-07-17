<?php

require_once "../vendor/autoload.php";

use app\core\Application;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('php://stdout', Logger::WARNING));

// add records to the log
$log->warning('Logger Started');

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
