<?php

namespace app\controller;

use app\core\View;

abstract class Controller {
    protected function render($viewName, $params = []) {
        View::make()->addMainLayout()->renderView($viewName, $params);
    }
}