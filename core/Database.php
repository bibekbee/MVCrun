<?php

namespace app\Core;
use PDO;

class Database{
    public $conn;
    public $statement;

    public function __construct(array $config){
        try{
            $this->conn = new PDO($config['dsn'], $config['user'], $config['pass'], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $err){
            echo "Connection Failed ". $err->getMessage();
        }
    }

    public function query($query, $prams = []) {
        if($this->conn){
        $this->statement = $this->conn->prepare($query);
        $this->statement->execute($prams);
        }else{
          $this->statement = [];
        }
        return $this;
  }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $result = $this->getAppliedMigrations();
        $files = scandir(dirname(__DIR__) . '/migrations');
        dd($files);
    }

    protected function createMigrationsTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `migrations` (
            `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `migration` VARCHAR(255),
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
          ) ENGINE=InnoDB;";
        
        $this->conn->exec($sql);
    }

    protected function getAppliedMigrations(){
        $statement = $this->conn->prepare("SELECT migration from migrations");
        $statement->execute();

        return $statement->fetchAll();
    }
}