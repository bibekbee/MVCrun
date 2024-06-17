<?php

namespace app\Core;

class Session{
    
    public static function put($key, $value ){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        };
    }

    public static function has($key){
        return (bool) static::get($key);
    }

    public static function flash($key, $value){
        $_SESSION['_flash'][$key] = $value;
    }

    public static function getflash($key){
        if(isset($_SESSION['_flash'][$key])){
            return $_SESSION['_flash'][$key];
        };

        return [];
    }

    public static function clearFlash(){
        unset($_SESSION['_flash']);
    }
}