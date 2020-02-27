<?php
  
  //require ABSPATH.'/database/Conexao.php';

  class AdminModel {
    private $con;

    public function __construct()
    {
      $this->con = new Conexao;
    }    

    
    /* Consulta os tickets em andamento e fechados */
    public function tickets_admin($id_admin, $id_status){

      $sql = "SELECT * FROM ticket  
        WHERE resp = :id_admin AND id_status = :id_status";       

      $sql = $this->con->conectar()->prepare($sql);

      $sql->bindParam("id_admin", $id_admin);
      $sql->bindParam("id_status", $id_status);
      $sql->execute();


      if($sql->rowCount() > 0)
      {
        return $sql->rowCount();

      }else{
        return false;
      }
    }
    
    public function tickets_aberto($id_status){

      $sql = "SELECT * FROM ticket  
        WHERE id_status = :id_status";       

      $sql = $this->con->conectar()->prepare($sql);
      
      $sql->bindParam("id_status",$id_status);
      $sql->execute();


      if($sql->rowCount() > 0)
      {
        return $sql->rowCount();

      }else{
        return false;
      }
    }

    public function tickets(){

      $sql = "SELECT 
        t.id,
        prod.name_product,
        list.name_ticket,
        t.descr,
        t.data_ticket,
        u.name_user,
        s.name_status        
        
        FROM ticket  as t

        INNER JOIN products as prod
        ON(prod.id = t.id_product)

        INNER JOIN list_ticket as list
        ON(list.id = t.id_list_ticket)

        INNER JOIN users as u
        ON(u.id = t.resp)

        INNER JOIN status as s
        ON(s.id = t.id_status)

        WHERE id_status != 3";       

      $sql = $this->con->conectar()->prepare($sql);      
      $sql->execute();


      if($sql->rowCount() > 0)
      {
        $dados = $sql->fetchAll();
        return $dados;

      }else{
        return false;
      }
    }

    

  }//Class

?>
