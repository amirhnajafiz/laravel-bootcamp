<?php 

namespace app\controller;

use app\controller\UserController;

class AdminUserController extends UserController {
    public function add_book($data) {
        # First we check validation
        # Then we add the book in model
        # After that redirect to the admin user view
    }

    public function add_author() {
        # First we check validation
        # Then we add the author in model
        # After that redirect to the admin user view
    }

    public function request_answer($request) {
        # Accept the request 
        # Update the model
        # After that send to admin user view
    }

    public function change_borrow_status($book) {
        # Check validation
        # Update the model
        # After that send to admin user view
    }
}

?>