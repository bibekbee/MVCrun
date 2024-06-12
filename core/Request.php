<?php
namespace app\Core;

class Request{
    public $input;
    public $errors = [];
    
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
        return false;
    }

    public function rule($key, $value){
        
        if($this->input[$key] == ''){
            if(is_array($value)){
                return $this->message($value['required']);
            }
            return $this->message($value);
        }

        if($key == 'email' && !filter_var($this->input[$key], FILTER_VALIDATE_EMAIL)){
            if(is_array($value)){
                return $this->message($value['valid']);
            }
            return $this->message($value);
        }

    }

    public function message($rule){
        $msg = [
            'required' => 'Valid input required',
            'valid' => 'Valid email address is required'
        ];
        return $msg[$rule] ?? '';
    }
}