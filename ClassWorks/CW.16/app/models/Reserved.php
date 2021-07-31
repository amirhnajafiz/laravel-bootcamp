<?php

namespace app\models;

use app\core\Model;

class Reserved extends Model {
    protected static $instance = null;
    
    public static function Do() {

        if (self::$instance == null)
            self::$instance = new Reserved('reserved');

        return self::$instance;
    }

    public function getRequests() {

        $query = "SELECT users.firstname,users.lastname,books.name,reserved.start_time,reserved.deadline_time,reserved.id,reserved.user_id,reserved.book_id FROM (( reserved INNER JOIN users ON users.id=reserved.user_id ) INNER JOIN books ON books.id=reserved.book_id) WHERE reserved.status=0;";
        
        return $this->db->query($query)->fetchAll();
    }

    public function getBooks($id) {

        $query = "SELECT books.name,books.author,reserved.start_time,reserved.deadline_time,reserved.id FROM (reserved INNER JOIN books ON books.id=reserved.book_id) WHERE reserved.user_id=$id;";
        
        return $this->db->query($query)->fetchAll();
    }

    public function accept($id) {
        $this->update([
                'status' => 1,
            ], 
            "id=$id",
        );

        $book_id = $this->select('book_id', "id=$id")[0]['book_id'];
        Book::Do()->update([
                'borrowed' => 1,
            ],
            "id=$book_id",
        );
    }

    public function reject($id) {
        
    }

    public function returned($id) {

        $book_id = $this->select('book_id', "id=$id")[0]['book_id'];
        Book::Do()->update([
                'borrowed' => 0,
            ],
            "id=$book_id",
        );

        $this->remove("id=$id");
    }
}