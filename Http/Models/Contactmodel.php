<?php

namespace app\Http\Models;
use app\Core\Model;

class Contactmodel extends Model
{
    protected function tablename() : string
    {
        return 'contact';
    } 
    
}