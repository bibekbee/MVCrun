<?php
namespace app\Core;

abstract class Model{
    protected $db;
    public array $attributes;

    public $sql = '';
 
    public function __construct(){
        $this->db = Application::container()->resolve('Core\Database');
    }

    abstract protected function tablename() : string;

    public function save($id = ''){
        $attr = (object) $this->getattr();
        if($id != ''){
            $attr->value[':id'] = $id; 
        }
        $data = $this->db->query($this->sql, $attr->value);
        
    }

    public function create(array $attr)
    {
        $tablename = $this->tablename();
        $this->attributes = $attr;
        $attr = (object) $this->getattr();
        $this->sql = "INSERT INTO $tablename ($attr->key) VALUES($attr->colonKey)";
    }

    public function update(array $attr)
    {
        $tablename = $this->tablename();
        $this->attributes = $attr;
        $arry = explode(',', $this->getattr()['key']);
        $sqlStatement = implode(',' ,array_map(fn($m) => "$m = :$m", $arry));
        $this->sql = "UPDATE $tablename SET " . $sqlStatement . " WHERE id = :id";
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