<?php

class AdminController extends LoadModel
{

  public function index() 
  {  
    if(isset($_GET['acao']) && $_GET['acao'] == 1){
      require_once ABSPATH.'/class/class-Actions.php';
      $action = new Actions();

      $action->renderiza_painel_admin();
    }    

    require_once ABSPATH.'/app/models/AdminModel.php';
    $id_admin = $_SESSION['id'];

    $model = new AdminModel(); 

    $abertos = $model->tickets_aberto(1);  
    $andamento = $model->tickets_admin($id_admin, 2);  
    $fechados = $model->tickets_admin($id_admin, 3);
    $tickets = $model->tickets();

    $view = new View(ABSPATH.'/resources/views/admin/painel_admin.php');

    $view->setParams(array('abertos' => $abertos,
          'andamento' => $andamento,
          'fechados' => $fechados,
          'tickets' => $tickets)); 

    $view->showContents();    
  } 
  
  public function tratamento() 
  {
    require_once ABSPATH.'/app/models/AdminModel.php';
    $model = new AdminModel();

    $id_ticket = $_GET['id'];
    $resp = $_SESSION['id'];     

    if($model->update_tratamanto($id_ticket, 2, $resp)){
      $action = new Actions();
      return $action->alterar_status();
    }   
    
    return 'não alterou status';
  }

  public function fechar() 
  {
    require_once ABSPATH.'/app/models/AdminModel.php';
    $model = new AdminModel();

    $id = $_GET['id'];   
    $atual = new DateTime();
    $data_at = $atual->format('Y-m-d H:i:s');     

    if($model->update_fechar($id, 3, $data_at)){
      $action = new Actions();
      return $action->alterar_status();
    }      
    
    return 'não alterou status';
  }

  public function tickets() 
  {
    require_once ABSPATH.'/app/models/AdminModel.php';
    require_once ABSPATH.'/lib/View.php';

    $model = new AdminModel(); 
    $id_admin = $_SESSION['id'];
    

    $tickets = $model->tickets_fechados($id_admin, 3);
   
    $view = new View(ABSPATH.'/resources/views/admin/tickets_fechados.php');

    $view->setParams(array('tickets' => $tickets));

    $view->showContents();    
  }
}

?>

