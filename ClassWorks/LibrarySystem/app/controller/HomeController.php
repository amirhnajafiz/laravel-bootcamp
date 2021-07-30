<?php

namespace app\controller;

use app\controller\Controller;

class HomeController extends Controller {
    public function index() {
        # Show the home page with the list of books
        $this->render('home');
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