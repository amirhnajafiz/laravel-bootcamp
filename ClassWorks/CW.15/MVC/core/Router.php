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
            # TODO: تمرین ۳
            /* وقتی به روت درخواست داده می‌شود که وجود ندارد باید status code ۴۰۴ به کاربر برگردد.
            قابلیت استاتوس کد باید همانند کلاس Request پیاده سازی شود و اصطلاحا هاردکد نباشد و کلاس مخصوص داشته باشد.
            */

            # TODO: تمرین ۴
            /* یک layout مخصوص صفحه خطا ایجاد کنید. */

            return "Not Found";
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        // در این قسمت از کد می‌توانید تغییری ایجاد تا سوال امتیازی حل شود.
        // اما راه‌حل‌های دیگری هم امکان پذیر است.
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