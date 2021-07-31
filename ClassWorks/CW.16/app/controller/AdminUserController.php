<?php 

namespace app\controller;

use app\core\Request;
use app\models\Book;
use app\models\Reserved;

class AdminUserController extends UserController {
    
    public function addBook(Request $request) {

        Book::Do()->insert($request->getParams());
        header("Location: /dashboard");
    
    }

    public function edit_book($book) {
        # Do the updates
        # After that redirect to the admin user view
    }

    public function remove_book($book) {
        # Do the delete function
        # After that redirect to the admin user view
    }

    public function requestResponse(Request $request) {
        $action = $request->getParams()['action'];
        $id = $request->getParams()['reserve_id'];

        switch ($action) {
            case 'accept':
                Reserved::Do()->accept($id);
                break;
            case 'reject':
                Reserved::Do()->reject($id);
        }

        header("Location: /dashboard");
    }

    public function change_borrow_status($book) {
        # Check validation
        # Update the model
        # After that send to admin user view
    }
}

?>