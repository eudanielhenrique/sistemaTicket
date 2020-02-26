<?php
class Conexao{

  private $user;
  private $password;
  private $banco;
  private $localhost;
  private static $pdo;

  public function __construct()
  {
    $this->localhost = "db";
    $this->banco = "teste";
    $this->user = "user";
    $this->password = "test";
  }

  public function conectar(){
    //session_start();

    try{
      if(is_null(self::$pdo)){
        self::$pdo = new PDO("mysql:host=".$this->localhost.";dbname=".$this->banco, $this->user, $this->password);
      }

      return self::$pdo;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
  }

}



