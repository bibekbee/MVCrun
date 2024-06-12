<?php

namespace app\Http\Controller;

use app\Core\Request;

class Contactcontroller extends Controller{
    public function index(){ 
        return view('contact/index.php');
    }

    public function store(Request $request){
        $result = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|valid'
        ]);
        if($result){
            return redirect('/');
        }
        return view('contact/index.php', ['errors' => $request->errors , 'input' => $request->input]);
    }

}



