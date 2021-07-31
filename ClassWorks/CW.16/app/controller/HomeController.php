<?php

namespace app\controller;

use app\core\Auth;
use app\models\User;
use app\models\Book;

class HomeController extends Controller {
    public function index() {
        # Show the home page with the list of books

        // Auth::init();
        $books = Book::Do()->select("id, name , author , borrowed ");

        $data = [
            "title" => 'home',
            'books' => $books,
            'isUser' => false,
            'isAdmin' => false,
        ];

        if (!array_key_exists('user_id', $_COOKIE)) {

            $this->render('webpage', $data);
            return;
        }

        if ($_COOKIE['user_type'] == 'normal') {

            $data['isUser'] = true;
            $this->render('webpage', $data);
            return;
        }

        if ($_COOKIE['user_type'] == 'admin') {

            $data['isUser'] = true;
            $data['isAdmin'] = true;
            $this->render('webpage', $data);
            return;
        }


        
    }

    public function login() {
        # Send user to login page
        $this->render('login', ['title' => 'login']);
    }

    public function signUp() {
        # Send user to sign up page
        $this->render('signUp', ['title' => 'sign up']);
    }
}