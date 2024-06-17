<?php
namespace app\Core\Middleware;

class Outh{
    public static function user(){
        if($_SESSION['user'] ?? false) {
            return true;
        }
        http_response_code(403);
        view('unauthorized.php');
        exit();
    }
}