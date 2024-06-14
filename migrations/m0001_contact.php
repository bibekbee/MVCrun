<?php
use app\Core\Application;

class Contact{
    protected $db;

    public function __construct(){
        $this->db = Application::container()->resolve('Core\Database');
    }

    public function up(){
        $sql = "CREATE TABLE IF NOT EXISTS contact(
            id int AUTO_INCREMENT PRIMARY KEY,
            first_name varchar(255) NOT NULL,
            last_name varchar(255),
            email varchar(255) NOT NULL,
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE = InnoDB;";
        $this->db->query($sql);
    }

    public function down(){
        $sql = "DROP TABLE contact";
        $this->db->query($sql);
    }
}