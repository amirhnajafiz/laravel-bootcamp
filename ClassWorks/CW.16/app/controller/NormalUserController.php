<?php 

namespace app\controller;

use app\controller\UserController;

class NormalUserController extends UserController {
    public function sign_up($data) {
        # Do sign up
        # First we get the data from our request
        # Assume that the data is stored in data
        if ($data) {
            # Create a new user in database and render the normal user view
        } else {
            # Return to sign up page with error
        }
    }

    public function borrow_book($book) {
        # Do borrowing
        # Check if the book is free
        # Create a request to admin
        # Redirect to normal user view
    }

    public function show_borrows() {
        # Return show user borrowed books view
        # Redirect to normal user view
    }

    public function return_book($book) {
        # Check validation
        # Return the borrowed book
        # Redirect to normal user view
    }
}

?>