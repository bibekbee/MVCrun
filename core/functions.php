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