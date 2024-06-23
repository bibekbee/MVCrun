<?php

function dd(...$attrs){
    foreach($attrs as $attr){
    echo '<pre>';
    var_dump($attr);
    echo '</pre>';
    }
    die();
}

function base_path($path){
    return __DIR__ . '/../' . $path;
}

function view($path, $attr = []){
    extract($attr);
    return require(__DIR__. '/../resources/views/' . $path); 
}

function redirect($path){
    header("location: $path");
    exit();
}

function bcrypt($pass){
    return password_hash($pass,PASSWORD_DEFAULT);
}

function pageNotFound(){
    http_response_code(404);
    view('_404.php');
}

function rebase($arr, $str){
    $fullString = '';
    foreach($arr as $a){
        $fullString =  $fullString . $a . $str;
    }

    return $fullString;
}