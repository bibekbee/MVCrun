<?php
namespace app\Core;
require_once(__DIR__ . '/Router.php');
class Application{

    public Router $router;
    public function  __construct(){
        $this->router = new Router();
    }
}