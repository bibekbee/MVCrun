<?php

namespace app\Http\Controller;

use app\Core\Request;

class Contactcontroller extends Controller{
    public function contact(){ 
        return view('contact/index.php');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|valid'
        ]);

        return view('contact/index.php', ['errors' => $request->errors , 'input' => $request->input]);
    }

}