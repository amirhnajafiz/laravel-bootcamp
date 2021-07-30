<?php

namespace route;

use app\core\Route;
use app\core\View;
use app\controller\HomeController;
use app\controller\UserController;
use app\controller\NormalUserController;
use app\controller\AdminUserController;

class RouteProvider {
    public static function makeRoutes() {
        
        // define all your routes here

        Route::get('/', [HomeController::class, 'index']);

        // Dashboard route
        Route::get('/login', [HomeController::class, 'login']);
        Route::get('/sign_up', [HomeController::class, 'sign_up']);

        // Login route
        Route::post('/login', [UserController::class, 'login']);

        // Normal user routes
        Route::post('/sign_up', [NormalUserController::class, 'sign_up']);
        Route::post('/borrow_book', [NormalUserController::class, 'borrow_book']);
        Route::post('/show_borrows', [NormalUserController::class, 'show_borrows']);
        Route::post('/return_book', [NormalUserController::class, 'return_book']);

        // Admin user routes
        Route::post('/add_book', [AdminUserController::class, 'add_book']);
        Route::post('/edit_book', [AdminUserController::class, 'edit_book']);
        Route::post('/remove_book', [AdminUserController::class, 'remove_book']);
        Route::post('/request_answer', [AdminUserController::class, 'request_answer']);
        Route::post('/change_borrow_status', [AdminUserController::class, 'change_borrow_status']);

    }       
}

?>
