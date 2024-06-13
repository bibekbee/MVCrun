<?php

class Contact{

    public function up(){
        echo "Applying Migrations Contact" , PHP_EOL;
    }

    public function down(){
        echo "Droping the table Contact";
    }
}