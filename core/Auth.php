<?php

namespace app\Core;

class Auth{
    private static $user; 

    public static function attempt($email, $password, $db){
        self::$user = $email; 
        $db = Application::container()->resolve('Core\Database');
        $result = $db->query('SELECT * FROM user WHERE email = :email', [':email' => $email])->fetchAll();
        if($result && password_verify($password, $result[0]['password'])){
            return $result;
        }else{
            $_SESSION['flash']['errors']['email'] = 'Password or email does not match';
            return false;
        }
    }

    public static function login(){
        Session::put('user', self::$user);
    }

    public static function logout(){
        Session::clear();
        redirect('/');
    }

}