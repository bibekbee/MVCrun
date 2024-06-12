<?php

namespace app\Core;

class Container{
    protected $bucket = [];

    public function bind($key , $fn){
        $this->bucket[$key] = $fn;
    }

    public function resolve($key){
        if(!array_key_exists($key, $this->bucket)){
            throw new \Exception("Not match found for {$key}");
        }
        
        return call_user_func($this->bucket[$key]);
    }
}