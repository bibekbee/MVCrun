<?php

function dd($dump){
    echo '<pre>';
    var_dump($dump);
    echo '</pre>';
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