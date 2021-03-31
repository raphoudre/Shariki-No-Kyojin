<?php
class Database {
    public $dataBase;
    public function __construct() {
        try {
            $this->dataBase = new PDO("mysql:host=localhost;dbname=projetpro", "codeit","EPLVnWV7Ynj2VNgj");
        }
        catch (Exception $e){
            die('Erreur : '. $e->getMessage());
        }
    }
}
