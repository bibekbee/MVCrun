<?php

namespace app\core;

class Router{
    public array $routes = [];
    public function get($path, $callback){
            $this->routes['get'][$path] = $callback;
    }

    public function resolve(){
        // dd($_SERVER);
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $path = $_SERVER['REQUEST_URI'];
        call_user_func($this->routes[$method][$path]);
    }
}