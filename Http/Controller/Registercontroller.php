<?php

namespace app\Http\Controller;

use app\Core\Request;
use app\Core\Application;
use app\Http\Models\Usermodel;
use app\Core\Session;

class Registercontroller extends Controller{
    public function index(){ 
        return view('register/index.php', ['errors' => Session::getflash('errors') , 'input' => Session::getflash('input')]);
    }

    public function store(Request $request){
        $request->table = 'user';
        $result = $request->validate([
            'email' => 'required|valid|unique',
            'password' => 'required|valid|min|',
            'confirm_password' => 'required|valid|min|confirm',
        ]);
        if($result){
            $contact = new Usermodel;
            $contact->create([
                'email' => $result['email'],
                'password' => bcrypt($result['password'])
            ]);
            $contact->save();
            redirect('/');
        }

        Session::flash('input', $request->input);
        redirect('register');
    }
}



