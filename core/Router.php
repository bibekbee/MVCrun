<?php

namespace app\Core;
use app\Core\Middleware\Outh;

class Router{
    public array $routes = [];
    public Request $request;

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
        return $this;
    }
    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
        return $this;
    }

    public function resolve(){
        $this->request = new Request();
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];

        $middleware = $this->routes['get'][$path]['middleware'] ?? false;
        $middleware ?? false ? $this->middlewareLogic($middleware, $path) : false;
        
        $callback = $this->routes[$method][$path] ?? false;

        //for the routes with id followed by it
        if(!$callback){
            $this->routeWithId($path, $method); 
        }
     
        if(is_array($callback)){
            $callback[0] = new $callback[0]();
        }
        $callback ? call_user_func($callback, $this->request) : $this->err();
        exit();
    }

    public function err(){
        pageNotFound();
    }

    public function auth($string){
        $last = array_key_last($this->routes['get']);
        if($string == 'user'){
            $this->routes['get'][$last]['middleware']['auth'] = 'user';
        }else if($string == 'guest'){
            $this->routes['get'][$last]['middleware']['auth'] = 'guest';
        }else{
            return false;
        }    
    }

    public function middlewareLogic($middleware, $path){
        if($middleware['auth'] == 'user'){
            if(!Outh::user()){
                unset($this->routes['get'][$path]['middleware']);
            }
        } 
       
        if($middleware['auth'] == 'guest'){
             if(!Outh::guest()){
                unset($this->routes['get'][$path]['middleware']);
             }
        }
        
    }

    public function routeWithId($path, $method){
        $parts = explode("/", $path);
        $newPath = rebase(array_slice($parts, 0, -1), '/');
        $arrayLength = count($parts);
        $numpart = $parts[$arrayLength - 1];
        $callback = '';
        $num = $numpart ?? false ? is_numeric($numpart) : false;
            if($num){
                $path = $newPath . '{id}';
                $id = $numpart;
                $callback = $this->routes[$method][$path] ?? false;
            }
        
        if(is_array($callback)){
            $callback[0] = new $callback[0]();
        }

        if($method == 'get'){
            $callback ? call_user_func($callback, $id) : $this->err();
        }else{
            $callback ? call_user_func($callback, $this->request, $id) : $this->err();
        }
        
        exit();
    }
}