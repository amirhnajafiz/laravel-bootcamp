<?php 

namespace app\controller;

use app\controller\UserController;

class NormalUserController extends UserController {
    public function sign_up() {
        # Do sign up
    }
    
    public function borrow_book() {
        # Do borrowing
    }

    public function show_borrows() {
        # Return show user borrowed books
    }

    public function return_book() {
        # Return a borrowed book
    }
}

?>