<?php
  if (!defined('ABSPATH')) exit;
 
  require_once ABSPATH.'/class/class-Actions.php';
  $action = new Actions();

  $params = $this->getParams();
  $abertos = $params['abertos'];
  $andamento = $params['andamento'];
  $fechados = $params['fechados']; 
  $tickets = $params['tickets'];
  
?>


<div class="card text-center align-items-center" id="cards-painel-admin">

<!-- Card1 -->
  <div class="card-deck">
    <div class="card text-white bg-primary mb-3">     
      <div class="card-body">
        <h5 class="card-title">Seus tickets fechados</h5>
        <p class="card-text">Quantidade <?php echo $fechados; ?> </p>
               
      </div>
    </div>

    <!-- Card2 -->
    <div class="card text-white bg-success mb-3">     
      <div class="card-body">
        <h5 class="card-title">Seus tickets em andamento</h5>
        <p class="card-text"> Quantidade <?php echo $andamento; ?> </p>
        
      </div>
    </div>

    <!-- Card3 -->
    <div class="card text-white bg-danger mb-3">     
      <div class="card-body">
        <h5 class="card-title">Total de tickets aguardando</h5>
        <p class="card-text"> Quantidade <?php echo $abertos; ?>  </p>
        
      </div>
    </div>

    <!-- Card4 -->
    <div class="card text-white bg-warning mb-3">     
      <div class="card-body">
        <h5 class="card-title">Total de tickets fechados</h5>
        <a href="admin/tickets">
          <p class="card-text">Consultar seus tickets fechados</p>
        </a>        
        
      </div>
    </div>
  </div>  

  <h2>Olá, <?php echo ucfirst($_SESSION['name_user']); ?> </h2>
  <div class="row" id="div-painel-user">
    <div class="col">
      <table class="table table-sm table-bordered" id="table-user">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Produto</th>
            <th scope="col">Categoria do ticket</th>
            <th scope="col">Descrição do cliente</th>
            <th scope="col">Data da abertura</th> 
            <th scope="col">Status</th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
        <tbody>            
          <?php
            foreach($tickets as $item){ ?>
              <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name_product']; ?></td>
                <td><?php echo $item['name_ticket']; ?></td>
                <td><?php echo $item['descr']; ?></td>
                <td><?php echo $item['data_ticket']; ?></td>                
                <td><?php echo $item['name_status']; ?></td>
                <td>           

                  <?php
                    echo (($item['id_status'] == 2) ? 
                        '<a href="admin/fechar&id='.$item['id'].'"> <button type="button" class="btn btn-primary">fechar</button> </a>' : 
                        '<a href="admin/tratamento&id='.$item['id'].'"> <button type="button" class="btn btn-success">dar tratamento</button> </a>');
                  ?>

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