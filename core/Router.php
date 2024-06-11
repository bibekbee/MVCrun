<?php

namespace app\Core;

class Router{
    public array $routes = [];
    public function get($path, $callback){
            $this->routes['get'][$path] = $callback;
    }

    public function resolve(){
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];
        $callback = $this->routes[$method][$path] ?? false;
        if(is_array($callback)){
            $callback[0] = new $callback[0]();
        }
        $callback ? call_user_func($callback) : $this->err();
    }

    public function err(){
        http_response_code(404);
        echo "Not Found";
    }
}