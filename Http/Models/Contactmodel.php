<?php

namespace app\Http\Models;
use app\Core\Model;

class Contactmodel extends Model
{
    protected function tablename() : string
    {
        return 'contact';
    } 

    public function find($id){
        $tablename = $this->tablename();
        return $this->db->query("SELECT * FROM $tablename WHERE id = :id", [':id' => $id])->fetch();
    }
    
}