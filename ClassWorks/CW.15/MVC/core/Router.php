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

    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            // تغییر استاتوس کد به ۴۰۴
            // نمایش layout مخصوص خطا
            return "Not Found";
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        // :)
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