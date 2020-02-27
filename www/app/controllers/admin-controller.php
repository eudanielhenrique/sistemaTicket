<?php

class AdminController extends LoadModel
{

  public function index() 
  {  
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
}

?>

