<?php
  
  require ABSPATH.'/database/Conexao.php';

  class TicketModel {
    private $con;

    public function __construct()
    {
      $this->con = new Conexao;
    }    

    public function list_tickets(){

      $sql = "SELECT * FROM list_ticket";
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

    public function products($id_user){

      $sql = "SELECT prod.name_product, s.id, s.id_product
          FROM sales as s 
          
          INNER JOIN products as prod
          ON(prod.id = s.id_product)
          
          WHERE id_user = :id_user";

      $sql = $this->con->conectar()->prepare($sql);

      $sql->bindParam("id_user", $id_user);
      $sql->execute();

      if($sql->rowCount() > 0)
      {
        $dados = $sql->fetchAll();
        return $dados;
      }else{
        return false;
      }
    }

    public function insert_ticket($id_user, $id_list, $id_product, $desc, $data){
      try {

        $prepare = $this->con->conectar()->prepare('INSERT INTO ticket 
        (id_user, id_list_ticket, id_product, descr, id_status, 
        data_ticket, data_fec, resp) 
        VALUES (:a,:b,:c,:d,:e,:f,:g,:h)');
        
        $prepare->bindValue(':a', $id_user);
        $prepare->bindValue(':b', $id_list);
        $prepare->bindValue(':c', $id_product);
        $prepare->bindValue(':d', $desc);
        $prepare->bindValue(':e', 1);
        $prepare->bindValue(':f', $data);
        $prepare->bindValue(':g', null);
        $prepare->bindValue(':h', null);       
  
              
        if($prepare->execute()){
          return true;
        }else{
          return false;
        }       
        
      } catch (Exception $e) {
        $this->con->rollback();
      }
    }
    

  }//Class

?>
