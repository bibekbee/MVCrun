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

    public function query($query, $params = []) {
        if($this->conn){
          $this->statement = $this->conn->prepare($query);
          $this->statement->execute($params);
        }else{
          $this->statement = [];
        }
        return $this->statement;
  }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $applied = $this->getAppliedMigrations();

        $files = array_diff(scandir(dirname(__DIR__) . '/migrations'), [".", ".."]);
        $files = array_map(fn($m) => pathinfo($m, PATHINFO_FILENAME), $files);

        $toapply = array_diff($files, $applied);
        
        $newMigrationList = [];
        foreach($toapply as $apply){
            require_once(dirname(__DIR__) . '/migrations/'. $apply.'.php');
    
            $pos = strpos($apply, '_') + 1;
            $className = strtoupper($apply[$pos]) . substr($apply, $pos + 1); //getting the migration Class
            $this->log("Applying migrations for " . $apply);
            (new $className)->up();
            $newMigrationList[] = $apply;
        }
        
        if(!empty($newMigrationList)){
            $this->save($newMigrationList);
        }else{
            echo "No Migrations to Apply";
            exit();
        }
        echo PHP_EOL;
        $this->log("All migrations applied successfully");
        exit();
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

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    protected function save(array $migrations){
        $migrationlist = implode(',' , array_map(fn($m) => "('$m')" , $migrations));

        $statement = $this->conn->prepare("INSERT INTO migrations (migration) VALUE $migrationlist");
        $statement->execute();
    }

    protected function log($msg){
        echo '['. date('Y-m-d H:i:s') . ']' . ' - ' . $msg . PHP_EOL;
    }
}