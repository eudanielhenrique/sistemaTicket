<?php

  class Actions 
  {
    public function valida_login(){

      if(isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password'])){

        $email = ($_POST['email'] != '') ? addslashes($_POST['email']) : false;
        $password = ($_POST['password'] != '') ? addslashes($_POST['password']) : false; 
        
        //User
        if($this->consulta_login($email, $password) == true){

          if($_SESSION['id_type_user'] == 1){
            require_once ABSPATH.'/app/controllers/ticket-controller.php';
            $ticket = new TicketController();
            return $ticket->index();
          } 
          
          //Admin
          else{
            require_once ABSPATH.'/app/controllers/admin-controller.php';
            $admin_controller = new AdminController();
            return $admin_controller->index();
          }

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

  /* Painel admin */
  

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

  public function renderiza_painel_admin()
  {
    require_once ABSPATH.'/lib/View.php';
    require_once ABSPATH.'/app/models/AdminModel.php';

         
  }

  public function ticket_cadastrado(){
    echo "<meta http-equiv='refresh' content='0;URL=../ticket&acao=1'/>

            <script type=\"text/javascript\">
            alert(\"Ticket cadastrado com sucesso ;)\");
            </script> ";
  }

  public function erro_ao_cadastrar(){
    echo "<meta http-equiv='refresh' content='0;URL=../ticket&acao=1'/>

            <script type=\"text/javascript\">
            alert(\"Erro ao cadastrar Ticket\");
            </script> ";
  }

  public function alterar_status() {
    echo "<meta http-equiv='refresh' content='0;URL=../../index.php'/>

            <script type=\"text/javascript\">
            alert(\"Status alterado com sucesso\");
            </script> ";
  }
}

  

?>