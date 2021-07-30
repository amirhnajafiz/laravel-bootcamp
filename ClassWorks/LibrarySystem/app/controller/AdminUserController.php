<?php 

namespace app\controller;

use app\controller\UserController;

class AdminUserController extends UserController {
    public function add_book($data) {
        # First we check validation
        # Then we add the book in model
        # After that redirect to the admin user view
    }

    public function edit_book($book) {
        # Do the updates
        # After that redirect to the admin user view
    }

    public function remove_book($book) {
        # Do the delete function
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