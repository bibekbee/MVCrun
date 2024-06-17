<?php
use app\Core\Application;

class User{
    protected $db;

    public function __construct(){
        $this->db = Application::container()->resolve('Core\Database');
    }

    public function up(){
        $sql = "CREATE TABLE IF NOT EXISTS user(
            id int AUTO_INCREMENT PRIMARY KEY,
            email varchar(255) NOT NULL,
            password varchar(255) NOT NULL,
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE = InnoDB;";
        $this->db->query($sql);
    }

    public function down(){
        $sql = "DROP TABLE user";
        $this->db->query($sql);
    }
}