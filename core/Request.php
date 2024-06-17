<?php
namespace app\Core;

class Request{
    public $input;
    public $errors = [];
    public $table = '';
    public $rules = ['required', 'valid', 'unique', 'min', 'exist'];
    
    public function __construct(){
        if(!empty($_GET)){
            $this->input = $_GET;
        }
        
        if(!empty($_POST)){
            $this->input = $_POST;
        }
    }

    public function validate(array $args){
        foreach($args as $key => $value){
            $pos = strpos($value, '|');
            if($pos){
                $parts = explode('|', $value);
                $args[$key] = array_combine($parts, $parts);
            }
            $result = $this->rule($key, $args[$key]);
            if($result){$this->errors[$key] =  $result;}
        }
        if(empty($this->errors)){
            return $this->input;
        }
        Session::flash('errors', $this->errors);
        return false;
    }

    public function rule($key, $value){

        if(is_array($value)){
            foreach($this->rules as $rule){
                $check[$rule] = $value[$rule] ?? false;  
            }
        }else{
            foreach($this->rules as $rule){
                if($rule == $value){
                    $check[$rule] = $value;
                }else{
                    $check[$rule] = false;
                }
            }
           
        }
        
        if($check['required']){
            $msg = $this->required($key, $check);
            if($msg != ''){
                $result = $msg;
            }
        }

        if($check['min']){
            $msg = $this->min($key, $check);
            if($msg != ''){
                $result = $msg;
            }
        }
        
        if($check['valid']){
            $msg = $this->valid($key, $check);
           
            if($msg != ''){
                $result = $msg;
            }
        }


        if($check['unique']){
            $msg = $this->unique($key, $check);
            if($msg != ''){
                $result = $msg;
            }
        }

        if($check['exist']){
            $msg = $this->exist($key, $check);
            if($msg != ''){
                $result = $msg;
            }
        }
    
        return $result ?? false;

    }

    public function message($rule){
        $msg = [
            'required' => 'Valid input required',
            'valid' => 'Valid email address is required',
            'unique' => 'This email is already used',
            'noemail' => 'Password or email does not match',
            'min' => 'Password must atleast 8 char long',
        ];
        return $msg[$rule] ?? '';
    }

    public function unique($key, $value){
        $data = false;
        if($this->table != ''){
        $db = Application::container()->resolve('Core\Database');    
        $data = $db->query("SELECT * FROM $this->table where email = :email", [':email' => $this->input[$key]])->fetchObject();
        $data = $data ? true : false;
        }
       
        if($key == 'email' && $data){
                return $this->message($value['unique']);
        }else{
            return '';
        }
    }

    public function required($key, $value){
        if($this->input[$key] == ''){
            return $this->message($value['required']);
        }else{
            return '';
        }
    }

    public function valid($key, $value){
        if($key == 'email' && !filter_var($this->input[$key], FILTER_VALIDATE_EMAIL)){
                    return $this->message($value['valid']);
        }
        else{
            return '';
        }
    }

    public function min($key, $value){
        if(strlen($this->input[$key]) < 8){
            return $this->message($value['min']);
        }
    }

    public function exist($key, $value){
        if($key == 'email')
        {
            $data = true;
            if($this->table != ''){
            $db = Application::container()->resolve('Core\Database');
            $data = $db->query("SELECT * FROM $this->table where email = :email", [':email' => $this->input[$key]])->fetchObject();
            }

            if(!$data){
                return $this->message('noemail');
            }
        }if($key == 'password')
        {
 
            $attempt = Auth::attempt($this->input['email'], $this->input['password'], $this->table);
            if(!$attempt){
                return $this->message('noemail');
            }
        }
        else{
            return '';
        }

    }


}