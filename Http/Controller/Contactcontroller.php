<?php

namespace app\Http\Controller;

use app\Core\Request;
use app\Core\Application;

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
            $db = Application::container()->resolve('Core\Database');
            dd($db);
            return redirect('/');
        }
        return view('contact/index.php', ['errors' => $request->errors , 'input' => $request->input]);
    }

}



