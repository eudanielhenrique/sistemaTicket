<?php
  require ABSPATH.'/lib/View.php';
  require ABSPATH.'/app/models/UserModel.php';

  class PedidosController extends LoadModel{

    public function index() 
    {        
    
      $id = $_SESSION['id'];
      $model = new UserModel();

      $pedidos = $model->sales($id);
    
      $view = new View(ABSPATH.'/resources/views/pedidos.php');

      $view->setParams(array('pedidos' => $pedidos));
      $view->showContents();
    }   

    public function teste(){
      echo 'clicou em sair';
    }
  }//Class

?>

