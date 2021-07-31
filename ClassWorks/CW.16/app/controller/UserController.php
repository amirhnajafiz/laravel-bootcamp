<?php 

namespace app\controller;

use app\core\Request;
use app\core\Auth;
use app\models\User;
use app\models\Reserved;

 class UserController extends Controller {

    protected HomeController $homeController;

    public function __construct() {
        $this->homeController = new HomeController();
    }

    public function showDashboard() {
        $type = $_COOKIE['user_type'];

        $data = ['title' => 'dashboard'];

        if ($type == 'admin') {
            $data['requests'] = Reserved::Do()->getRequests();
            $this->render('adminPanel', $data);
        }
        else {
            $data['books'] = Reserved::Do()->getBooks(Auth::getId());
            $this->render('userPanel', $data);
        }
    }

    public function login(Request $request) {
        $data = $request->getParams();

        $user = User::Do()->select("id,type", "email='{$data['email']}' AND password='{$data['password']}';");
        
        if ($user != [] ) {
            setcookie('user_id', $user[0]['id'], ['path' => '/']);
            setcookie('user_type', $user[0]['type'], ['path' => '/']);
            header("Location: /dashboard");
            exit();
        }

        header("Location: /login");
    }
}

?>