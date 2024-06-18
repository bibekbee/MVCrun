<?php
namespace app\Core\Middleware;

class Outh{
    public static function user(){
        if($_SESSION['user'] ?? false) {
            return false;
        }
        http_response_code(403);
        view('errors.php', ['errMessage' => 'You have to login to view this page']);
        exit();
    }

    public static function guest(){
        if($_SESSION['user'] ?? false){
            redirect('/');
            exit();
        }

        return false;
    }
}