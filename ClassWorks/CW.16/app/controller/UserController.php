<?php 

namespace app\controller;

use app\controller\Controller;
use app\controller\HomeController;

class UserController extends Controller {

    protected HomeController $homeController;

    public function __construct() {
        $this->homeController = new HomeController();
    }

    public function login($username, $password) {
        # Validate the username and password to database
        # Assume we store the result in a object called user
        $user;
        if ($user) {
            if ($user->is_admin) {
                # Render the admin user page
            } else {
                # Render the normal user page
            }
        } else {
            $this->homeController->index();
        }
    }
}

?>