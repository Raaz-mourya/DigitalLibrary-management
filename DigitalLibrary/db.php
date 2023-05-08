<?php
class db {
    protected $connection;

    function setconnection(){
        try {
            $this->connection= new PDO("mysql:host=localhost;dbname=digital_library","root","");
            // echo "Connection Established";
        } catch(PDOException $e){
            echo "Connection Error";
        }
    }
}

?>