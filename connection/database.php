<?php
class database {
private $dbserver="localhost";
private $dbuser="root";
private $dbpassword="";
private $dbname="mydata";
protected $conn;

//constructor
public function __construct(){
    try{
        $dsn="mysql:host={$this->dbserver}; dbname={$this->dbname}; charset=utf8";
        $options=array(PDO::ATTR_PERSISTENT);
        $this->conn=new PDO($dsn, $this->dbuser,$this->dbpassword,$options);

    }catch(PDOException $e){
        echo "connection error".$e->getMessage();
    }



}


}


?>