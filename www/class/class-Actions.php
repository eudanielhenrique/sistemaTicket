<?php

  class Actions 
  {
    public function valida_login(){

      if(isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password'])){

        $email = ($_POST['email'] != '') ? addslashes($_POST['email']) : false;
        $password = ($_POST['password'] != '') ? addslashes($_POST['password']) : false; 
        
        if($this->consulta_login($email, $password) == true){

          require_once ABSPATH.'/app/controllers/ticket-controller.php';
          $ticket = new TicketController();
          return $ticket->index();

        }else{
          return $this->acesso_nao_permitido();
        }
      }
    }

  public function consulta_login($email, $password){
    if($email != false && $password != false){

      require_once ABSPATH.'/app/models/UserModel.php';
      $model = new UserModel();  
  
      if($model->login($email, $password) == true){

        if(isset($_SESSION['id']) && isset($_SESSION['email']) 
          && isset($_SESSION['name_user'])){
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }  
    }else{
      return false;
    }
  }

  public function acesso_nao_permitido(){
    echo "<meta http-equiv='refresh' content='0;URL=index.php'/>

            <script type=\"text/javascript\">
            alert(\"Dados inválidos\");
            </script> ";
  }

  public function renderiza_ticket()
  {
    require ABSPATH.'/lib/View.php';
    require ABSPATH.'/app/models/UserModel.php';

    require ABSPATH.'/resources/views/includes/header.php';     
  }
}

  

?>