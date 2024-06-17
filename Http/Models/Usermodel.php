<?php

namespace app\Http\Models;
use app\Core\Model;

class Usermodel extends Model
{
    protected function tablename() : string
    {
        return 'user';
    } 
    
}