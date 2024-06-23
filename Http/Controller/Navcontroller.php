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
        $contactdata = (new Contactmodel)->find($id);
        if(!$contactdata){pageNotFound(); exit();}
        view('detail.php', ['contact' => $contactdata]);
    }

    public function update($id){
        dd("Hi there I received $id");
    }

}