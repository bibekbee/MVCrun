<?php
namespace app\Core;

abstract class Model{
    protected $db;
    public array $attributes;
 
    public function __construct(){
        $this->db = Application::container()->resolve('Core\Database');
    }

    abstract protected function tablename() : string;

    public function save(){
        $tablename = $this->tablename();
        $attr = (object) $this->getattr();
        $data = $this->db->query("INSERT INTO $tablename($attr->key) VALUES($attr->colonKey)", $attr->value);
    }

    public function create(array $attr)
    {
        $this->attributes = $attr;
    }

    public function fetchAll(){
        $tablename = $this->tablename();
        return $this->db->query("SELECT * FROM $tablename")->fetchAll();
    }

    public function getattr(){
        $attr = [];
        foreach($this->attributes as $key => $value){
            $attr['key'][] = $key;
            $attr['colonKey'][] = ':'.$key;
            $attr['value'][":$key"] = $value;
        }

        $attr['key'] = implode(',', $attr['key']);
        $attr['colonKey'] = implode(',', $attr['colonKey']);
        return $attr;
    }

}