<?php

namespace app\Http\Controller;

use app\Core\Request;
use app\Core\Application;
use app\Http\Models\Usermodel;
use app\Core\Auth;
use app\Core\Session;


class Logincontroller extends Controller{
    public function index(){ 
        return view('login/index.php', ['errors' => Session::getflash('errors') , 'input' => Session::getflash('input')]);
    }

    public function store(Request $request){
        $request->table = 'user';
        $result = $request->validate([
            'email' => 'required|valid|exist',
            'password' => 'required|min|exist',
        ]);
       
        if($result){
            $attempt = Auth::attempt($result['email'], $result['password'], $request->table);
            if($attempt){
                Auth::login();
            }
            redirect('/');
        }

        Session::flash('input', $request->input);
        redirect('login');
    }

    public function destroy(){
        Auth::logout();
    }
}



