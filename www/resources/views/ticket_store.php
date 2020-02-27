<?php
  if (!defined('ABSPATH')) exit;

  include ABSPATH . '/resources/views/includes/header.php';
  require_once ABSPATH.'/class/class-Actions.php';
  $action = new Actions();

  $params = $this->getParams();
  $list = $params['list'];
  $products = $params['products']; 
  
  $msg = (isset($params['msg']) && !empty($params['msg'])) ? $params['msg'] : null;
?>

<div class="card text-center align-items-center">
  
  <div class="card" style="margin-top: 30px">
    <h5 class="card-header">Olá, <?php echo ucfirst($_SESSION['name_user']); ?> </h5>
      <div class="card-body">
        <h5 class="card-title">Abrir ticket de atendimento</h5>
        
        <form action="register" method="post">
          <div class="form-row">

          <!-- Assunto ticket -->
          <div class="form-group col-md-6">
            <label for="assunto">Assunto</label>
            <select class="custom-select" name="assunto">
              <?php
                foreach($list as $item){ ?>
                  <option value="<?php echo $item['id']; ?>">
                    <?php echo $item['name_ticket']; ?>
                  </option>
                <?php
                }
              ?>         
            </select>
          </div>

          <!-- Qual a venda? -->
          <div class="form-group col-md-6">
            <label for="venda">Venda</label>
            <select class="custom-select" name="venda">
              <?php
                foreach($products as $item){ ?>
                  <option value="<?php echo $item['id_product']; ?>">
                    <?php echo $item['name_product']; ?>
                  </option>
                <?php
                }
              ?>         
            </select>
          </div>
        </div> <!-- Fechou a primera row -->

        <!-- Descrição do ticket pelo cliente -->
        <div class="form-group">
          <label for="motivo">Informe o motivo do ticket</label>
          <input type="text" class="form-control" 
              id="exampleFormControlTextarea1" 
              rows="3"
              name="motivo"
              placeholder="Máx 40 letras">
          </input>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="../ticket&acao=1">
          <button type="button" class="btn btn-primary"> 
            Voltar 
          </button>
        </a>
    
      </form>
      
      </div> <!-- Card body -->
  </div> <!--Card -->
</div> <!-- Card principal -->