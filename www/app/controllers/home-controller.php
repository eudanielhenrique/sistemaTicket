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
}

?>

