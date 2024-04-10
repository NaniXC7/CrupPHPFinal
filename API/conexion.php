<?php

class DB{
    private $connecta = null;
    private $host= 'localhost';
    private $db= 'mydb';
    private $user= 'root';
    private $password= '';
    
    public function _construct(){
     
    }
    //funcion para conectarse a la BD
function connex(){
    try {
        $connecta = "mysql:host=".$this->host.";dbname=" . $this->db ;
        $opcion=[
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($connecta,$this->user,$this->password);
        return $pdo;
    } catch (PDOException $e) {
        print_r('Error connection: ' . $e->getMessage());
    }
}


}

?>