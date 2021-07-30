<?php

namespace app\controller;

use app\controller\Controller;

class HomeController extends Controller {
    public function index() {
        # Render the first page (index.php)
        $this->render('index');
    }

    public function home() {
        # Check if user is admin - render the admin view
        # If user is normal - render the normal user view
        # Default - send the user to home page
    }

    public function login() {
        # Send user to login page
        $this->render('login');
    }

    public function sign_up() {
        # Send user to sign up page
        $this->render('sign_up');
    }
}