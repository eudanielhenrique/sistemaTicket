<?php
  
  require_once ABSPATH.'/database/Conexao.php';

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
        s.name_status,
        t.id_status       
        
        FROM ticket  as t
                
        INNER JOIN products as prod
        ON(prod.id = t.id_product)

        INNER JOIN list_ticket as list
        ON(list.id = t.id_list_ticket)

        
        INNER JOIN status as s
        ON(s.id = t.id_status)
        
        WHERE id_status != 3
        ORDER BY t.id_status DESC";       

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

    public function update_fechar($id_ticket, $id_status, $data_fec)
    {
      $sql = "UPDATE ticket SET id_status = :id_status, data_fec = :data_fec WHERE id = :id_ticket";
      $sql = $this->con->conectar()->prepare($sql);
      
      $sql->bindParam("id_status", $id_status);
      $sql->bindParam("data_fec", $data_fec);
      $sql->bindParam("id_ticket", $id_ticket);      

      if($sql->execute())
      {              
        return true;
      }else{
        return false;
      }
    } 

    public function update_tratamanto($id_ticket, $id_status, $resp)
    {
      $sql = "UPDATE ticket SET id_status = :id_status, resp = :resp WHERE id = :id_ticket";
      $sql = $this->con->conectar()->prepare($sql);
      
      $sql->bindParam("id_status", $id_status);
      $sql->bindParam("id_ticket", $id_ticket); 
      $sql->bindParam("resp", $resp);      

      if($sql->execute())
      {              
        return true;
      }else{
        return false;
      }
    }     
    

    public function tickets_fechados($resp, $id_status) {
      $sql = "SELECT prod.name_product, t.descr, list.name_ticket, t.data_fec FROM  ticket as t
        INNER JOIN products as prod
        ON(prod.id = t.id_product)

        INNER JOIN list_ticket as list
        ON(list.id = t.id_list_ticket)

        WHERE resp = :resp AND id_status = :id_status";       

      $sql = $this->con->conectar()->prepare($sql);
      
      $sql->bindParam("resp",$resp);
      $sql->bindParam("id_status",$id_status);
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
