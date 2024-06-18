<?php

namespace app\Http\Controller;
use app\Http\Models\Contactmodel;

class Navcontroller extends Controller{

    public function index(){
        $contactdata = (new Contactmodel)->fetchAll();
        return view('index.php', ['name' => 'Bikash', 'contacts' => $contactdata]);
    }

    public function profile(){
        return view('profile.php');
    }

   


}