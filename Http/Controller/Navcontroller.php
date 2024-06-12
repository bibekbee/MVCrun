<?php

namespace app\Http\Controller;


class Navcontroller extends Controller{

    public function index(){
        return view('index.php', ['name' => 'Bikash']);
    }

    public function about(){
        return view('about.php');
    }

   


}