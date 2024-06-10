<?php

namespace app\Http\Controller;

class Navcontroller{

    public function index(){
        return view('index.php');
    }

    public function about(){
        return view('about.php');
    }
}