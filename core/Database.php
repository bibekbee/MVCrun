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

}