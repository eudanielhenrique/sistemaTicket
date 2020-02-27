<?php
require ABSPATH.'/lib/View.php';

class HomeController extends LoadModel
{

  public function index() 
  {
    // Título da página
    $this->title = 'Home';
    
    // Parametros da função
    $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

    include ABSPATH . '/resources/views/includes/header.php';
    
    $view = new View(ABSPATH.'/resources/views/login.php');    
    $view->showContents();    
  } 

  public function teste() {
    echo 'entrou no teste';
  }

  public function logout()
  {	
    unset ($_SESSION['id']);
    unset ($_SESSION['email']);
    unset ($_SESSION['name_user']);
    unset ($_SESSION['id_type_user']);
    
    session_destroy(); //LIMPA O ARRAY SESSION    
    header ('Location:/home');
  }
}

?>

