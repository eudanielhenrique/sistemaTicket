<?php
  
  require ABSPATH.'/database/Conexao.php';

  class UserModel {
    private $con;

    public function __construct()
    {
      $this->con = new Conexao;
    }

    public function login($email, $password)
    {

      $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
      $sql = $this->con->conectar()->prepare($sql);

      $sql->bindParam("email", $email);
      $sql->bindParam("password", $password);
      $sql->execute();


      if($sql->rowCount() > 0)
      {
        $dados = $sql->fetch();

        $_SESSION['id'] = $dados['id'];
        $_SESSION['email'] = $dados['email'];
        $_SESSION['name_user'] = $dados['name_user'];

        return true;
      }else{
        return false;
      }
    }

    //Pedidos
    public function sales($id_user)
    {      
      $sql = "SELECT 
        pay.id,
        prod.name_product,
        s.amount,
        pay.total,
        s.date_request,
        s.date_delivery

        FROM payment as pay

        INNER JOIN sales as s
        ON (s.id = pay.id_sale)

        INNER JOIN products as prod
        ON (prod.id = s.id_product)

        WHERE id_user = :id_user";
      
      $sql = $this->con->conectar()->prepare($sql);

      $sql->bindParam("id_user", $id_user);
      $sql->execute();


      if($sql->rowCount() > 0)
      {
        $sales = $sql->fetchAll();
        return $sales;

      }else{
        return false;
      }
    }

    public function tickets($id_user)
    {

      $sql = "SELECT 
        t.id,
        prod.name_product,
        list.name_ticket,
        t.descr,
        t.data_ticket,
        t.data_fec,
        s.name_status

        FROM ticket as t

        INNER JOIN products as prod 
        ON (prod.id = t.id_product)

        INNER JOIN list_ticket as list 
        ON (list.id = t.id_list_ticket)        

        INNER JOIN status as s 
        ON (s.id = t.id_status)
               
        WHERE id_user = :id_user";       

      $sql = $this->con->conectar()->prepare($sql);

      $sql->bindParam("id_user", $id_user);
      $sql->execute();


      if($sql->rowCount() > 0)
      {
        $sales = $sql->fetchAll();
        return $sales;

      }else{
        return false;
      }
    }   

    public function tickets_pendentes($id_user)
    {

      $sql = "SELECT * FROM ticket  
        WHERE id_user = :id_user AND id_status = 1";       

      $sql = $this->con->conectar()->prepare($sql);

      $sql->bindParam("id_user", $id_user);
      $sql->execute();


      if($sql->rowCount() > 0)
      {
        return $sql->rowCount();

      }else{
        return false;
      }
    }   

    public function tickets_solucionados($id_user)
    {

      $sql = "SELECT * FROM ticket  
        WHERE id_user = :id_user AND id_status = 3";       

      $sql = $this->con->conectar()->prepare($sql);

      $sql->bindParam("id_user", $id_user);
      $sql->execute();


      if($sql->rowCount() > 0)
      {
        return $sql->rowCount();

      }else{
        return false;
      }
    }   

  }//Class

?>
