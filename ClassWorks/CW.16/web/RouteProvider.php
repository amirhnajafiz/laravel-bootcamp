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
        Route::get('/signUp', [HomeController::class, 'signUp']);
        Route::get('/dashboard', [UserController::class, 'showDashboard']);

        // Login route
        Route::post('/login', [UserController::class, 'login']);

        // Normal user routes
        Route::post('/signUp', [NormalUserController::class, 'signUp']);
        Route::post('/borrowBook', [NormalUserController::class, 'borrowBook']);
        Route::post('/show_borrows', [NormalUserController::class, 'show_borrows']);
        Route::post('/returnBook', [NormalUserController::class, 'returnBook']);

        // Admin user routes
        Route::post('/addBook', [AdminUserController::class, 'addBook']);
        Route::post('/edit_book', [AdminUserController::class, 'edit_book']);
        Route::post('/remove_book', [AdminUserController::class, 'remove_book']);
        Route::post('/requestResponse', [AdminUserController::class, 'requestResponse']);
        Route::post('/change_borrow_status', [AdminUserController::class, 'change_borrow_status']);

    }       
}

?>
