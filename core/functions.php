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