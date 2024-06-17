<?php

namespace app\Http\Controller;

use app\Core\Request;
use app\Core\Application;
use app\Http\Models\Contactmodel;
use app\Core\Session;

class Contactcontroller extends Controller{
    public function index(){ 
        return view('contact/index.php', ['errors' => Session::getflash('errors') , 'input' => Session::getflash('input')]);
    }

    public function store(Request $request){
        $request->table = 'contact';
        $result = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique|valid'
        ]);
       
        if($result){
            $contact = new Contactmodel;
            $contact->create($result);
            $contact->save();
            redirect('/');
        }

        Session::flash('input', $request->input);
        redirect('contact');
    }
}



