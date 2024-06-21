<?php

namespace app\Http\Controller;
use app\Http\Models\Contactmodel;

class Navcontroller extends Controller{

    public function index(){
        return view('index.php', ['name' => 'Bikash']);
    }

    public function profile(){
        $contactdata = (new Contactmodel)->fetchAll();
        return view('profile.php', ['contacts' => $contactdata]);
    }

    public function detail($id){
        echo "hi there";
    }

}