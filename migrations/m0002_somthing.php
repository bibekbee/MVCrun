<?php

class Somthing{
    public function up(){
        echo "Applying Migrations Somthing" . PHP_EOL;
    }

    public function down(){
        echo "Droping the table";
    }
}