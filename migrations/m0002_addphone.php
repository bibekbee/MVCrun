<?php
use app\Core\Application;

class AddPhone{
    protected $db;

    public function __construct(){
        $this->db = Application::container()->resolve('Core\Database');
    }

    public function up(){
        $sql = "ALTER TABLE contact ADD COLUMN phone bigINT(20) NOT NULL";
        $this->db->query($sql);
    }

    public function down(){
        $sql = "ALTER TABLE contact DROP COLUMN phone";
        $this->db->query($sql);
    }
}