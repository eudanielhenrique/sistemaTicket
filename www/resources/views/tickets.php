<?php

  if (!defined('ABSPATH')) exit;

  // require_once ABSPATH.'/class/class-Actions.php';
  // $action = new Actions();

  $params = $this->getParams();
  $tickets = $params['tickets'];  
  $count = count($tickets);
  
  $tickets_pendentes = (($params['pendentes'] == false) ? 0 : $params['pendentes']);
  $tickets_solucionados = (($params['solucionados'] == false) ? 0 : $params['solucionados']);
  
?>

<div class="card text-center align-items-center">
  <div class="row">

    <div class="col-3">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" name="pedidos" id="list-home-list" data-toggle="list" href="pedidos/index" role="tab" aria-controls="home">
          Meus pedidos                 
        </a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="ticket/store" role="tab" aria-controls="profile">
          <i class="fa fa-ticket" aria-hidden="true"> Abrir ticket</i>
        </a>             
      </div>
    </div>

    <div class="col-9" id="container-mail">
      <div class="card-group">
        <div class="card-deck">

          <!-- Card 1 -->
          <div class="card text-white bg-danger mb-3">
            <div class="card-body">
              <h5 class="card-title">Todos meus Tickets</h5>
              <p class="card-text"><?php echo $count; ?></p>
              <hr style="background-color: white;">
              <p class="card-text text-white"><small>Last updated 3 mins ago</small></p>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="card text-white bg-primary mb-3">
            <div class="card-body">
              <h5 class="card-title">Tickets pendentes</h5>
              <p class="card-text"><?php echo $tickets_pendentes; ?></p>
              <hr style="background-color: white;">
              <p class="card-text text-white"><small>Last updated 3 mins ago</small></p>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="card text-white bg-warning mb-3">
            <div class="card-body">
              <h5 class="card-title">Tickets solucionados</h5>
              <p class="card-text"><?php echo $tickets_solucionados; ?></p>
              <hr style="background-color: white;">
              <p class="card-text text-white"><small>Last updated 3 mins ago</small></p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>  <!-- Final da Row -->
  
  <h2>Seus Tickets <?php echo ucfirst($_SESSION['name_user']); ?> </h2>
  <div class="row" id="div-painel-user">
    <div class="col">
      <table class="table table-sm table-bordered" id="table-user">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Produto</th>
            <th scope="col">Nome ticket</th>
            <th scope="col">Descrição</th>
            <th scope="col">Data da abertura</th>
            <th scope="col">Data do Fechamento</th>            
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          
            <?php
              foreach($tickets as $item){
                ?>
                <tr>
                  <td>
                    <?php echo $item['id']; ?>
                  </td>
                  <td>
                    <?php echo $item['name_product']; ?>
                  </td>
                  <td>
                    <?php echo $item['name_ticket']; ?>
                  </td>
                  <td>
                    <?php echo $item['descr']; ?>
                  </td>
                  <td>
                    <?php echo (($item['data_ticket'] == null) ? '----' : 
                        date("d/m/Y", strtotime($item['data_ticket']))); 
                    ?>
                  </td>
                  <td>
                    <?php echo (($item['data_fec'] == null) ? '----' : 
                        date("d/m/Y", strtotime($item['data_fec']))); 
                    ?>
                  </td>
                  <td>
                    <?php echo $item['name_status']; ?>
                  </td>
                </tr>
                <?php
              }
            ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>