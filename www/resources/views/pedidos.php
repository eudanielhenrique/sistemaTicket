<?php
  if (!defined('ABSPATH')) exit;

  include ABSPATH . '/resources/views/includes/header.php';
  require_once ABSPATH.'/class/class-Actions.php';
  $action = new Actions();

  $params = $this->getParams();
  $pedidos = $params['pedidos'];  
  
?>

<div class="card text-center align-items-center">
  <h1>Meus Pedidos:</h1>

  <div class="row" id="div-painel-user">
    <div class="col">
      <table class="table table-sm table-bordered" id="table-user">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor</th>
            <th scope="col">Data da compra</th>
            <th scope="col">Data do recebimento</th>            
          </tr>
        </thead>
        <tbody>
          <tr>

          <?php
            foreach($pedidos as $item){
              ?>
              <td>
                <?php echo $item['id']; ?>
              </td>
              <td>
                <?php echo $item['name_product']; ?>
              </td>
              <td>
                <?php echo $item['amount']; ?>
              </td>
              <td>
                <?php echo $item['total']; ?>
              </td>
              <td>
                <?php echo $item['date_request']; ?>
              </td>              
              <td>
                <?php echo $item['date_delivery']; ?>
              </td>
              <?php
            }
          ?>            
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <a href="../ticket&acao=1">
    Voltar    
  </a>
  
</div>