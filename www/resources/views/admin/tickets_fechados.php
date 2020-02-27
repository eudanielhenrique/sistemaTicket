<?php
  if (!defined('ABSPATH')) exit;

  include ABSPATH . '/resources/views/includes/header.php';
  require_once ABSPATH.'/class/class-Actions.php';
  $action = new Actions();

  $params = $this->getParams();
  $tickets = $params['tickets'];   
  
?>

<div class="card text-center align-items-center">
  <h2>Seus tickets fechados</h2>

  <div class="row" id="div-painel-user">
    <div class="col">
      <table class="table table-sm table-bordered">
        <thead>
          <tr>            
            <th scope="col">Produto</th>
            <th scope="col">Descrição do ticket</th>
            <th scope="col">Categoria</th>
            <th scope="col">Data de fechamento</th>          
          </tr>
        </thead>
        <tbody>
          
          <?php
            foreach($tickets as $item){
              ?>
              <tr>
                <td>
                  <?php echo $item['name_product']; ?>
                </td>
                <td>
                  <?php echo $item['descr']; ?>
                </td>
                <td>
                  <?php echo $item['name_ticket']; ?>
                </td>                
                <td>
                  <?php echo date("d/m/Y", strtotime($item['data_fec'])); ?>
                </td>            
                
              </tr>
              <?php
            }
          ?>            
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <a href="../index.php">
    <button type="button" class="btn btn-info">Voltar</button>    
  </a>  
  
</div>