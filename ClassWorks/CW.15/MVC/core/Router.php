<?php

namespace app\core;

class Router
{

    public Request $request;

    protected $routes = [];

    public function __construct($request) {
        $this->request = $request;
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            http_response_code(404);
            return $this->renderView('404');
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if ($method == 'post')
            return call_user_func($callback, $this->request->getInputs());
        else    
            return call_user_func($callback);
    }

    private function renderView($view) {
        $layout = $this->loadLayout();
        $view = $this->loadView($view);
        return str_replace("{{content}}", $view, $layout);
    }

    private function loadLayout() {
        ob_start();
        include_once __DIR__ . "/../view/layouts/main.php";
        return ob_get_clean();
    }

    private function loadView($view) {
        ob_start();
        include_once __DIR__ . "/../view/" . $view . ".php";
        return ob_get_clean();
    }
}