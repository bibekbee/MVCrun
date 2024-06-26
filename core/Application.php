<?php
namespace app\Core;
class Application{

    public Router $router;
    protected static $container;

    public function  __construct(){
        $this->router = new Router();
    }

    public static function SetContainer($content){
        Application::$container = $content;
    }

    public static function container() {
        return Application::$container;
    }
}