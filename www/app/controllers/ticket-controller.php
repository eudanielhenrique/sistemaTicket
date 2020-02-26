<?php

  
  class TicketController extends LoadModel{

    public function index() {

      if(isset($_GET['acao']) && $_GET['acao'] == 1){
        require_once ABSPATH.'/class/class-Actions.php';
        $action = new Actions();

        $action->renderiza_ticket();
      }
           
    $id = $_SESSION['id'];
    $model = new UserModel();
    
    $tickets = $model->tickets($id); 
    
    $tickets_pendentes = $model->tickets_pendentes($id);
    $tickets_solucionados = $model->tickets_solucionados($id);

    
    $view = new View(ABSPATH.'/resources/views/tickets.php');

    $view->setParams(array('tickets' => $tickets, 
          'pendentes' => $tickets_pendentes,
          'solucionados' => $tickets_solucionados));

    $view->showContents();

    } 
    
    public function store(){
      include ABSPATH . '/lib/View.php'; 
      include ABSPATH . '/app/models/TicketModel.php';      
      $view = new View(ABSPATH.'/resources/views/ticket_store.php');

      $id = $_SESSION['id'];

      $model = new TicketModel();
      $list = $model->list_tickets();
      $products = $model->products($id);

      $view->setParams(array('list' => $list,
            'products' => $products));
      
      $view->showContents();
    }

    public function register()
    {
      require_once ABSPATH . '/app/requests/RequestForm.php';
      require_once ABSPATH . '/app/models/TicketModel.php'; 
      $request = new RequestForm();      

      //Realiza validações do formulário
      $request->form_ticket_store();
      $modelTicket = new TicketModel();

      $id_user = $_SESSION['id'];
      $id_list = $_POST['assunto'];
      $id_product = $_POST['venda'];
      $desc = $_POST['motivo'];

      $atual = new DateTime();
      $a = $atual->format('Y-m-d H:i:s'); 
      
      $modelTicket->insert_ticket($id_user, $id_list, $id_product, $desc, $a);
      
    }

  }//Class

?>

