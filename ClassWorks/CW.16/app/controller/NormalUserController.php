<?php 

namespace app\controller;

use app\core\Request;
use app\models\User;
use app\models\Reserved;

class NormalUserController extends UserController {

    public function signUp(Request $request) {
        $data = $request->getParams();

        $user = User::Do()->select("id", "email='{$data['email']}'");
        
        if ($user != []) {
            header("Location: /signUp");
            exit();
        }

        $data['type'] = 'normal';
        User::Do()->insert($data);

        header("Location: /login");

    }

    public function borrowBook(Request $request) {
        $book_id = $request->getParams()['book_id'];
        $user_id = $request->getParams()['user_id'];

        Reserved::Do()->insert([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'start_time' => time(),
            'deadline_time' => time() + 25200,
        ]);

        header("Location: /");
    }

    public function show_borrows() {
        # Return show user borrowed books view
        # Redirect to normal user view
    }

    public function returnBook(Request $request) {
        $id = $request->getParams()['reserve_id'];
        Reserved::Do()->returned($id);
        echo "ye kary kardam";
        header("Location: /dashboard");
    }
}

?>