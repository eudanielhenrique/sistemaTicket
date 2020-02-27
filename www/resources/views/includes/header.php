<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="Gisele de Lima, gntsilva.gl@gmail.com">
    <!-- Estilos -->
    <link rel="stylesheet" href="<?php echo HOME_FILE; ?>" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ac6ccd8fac.js" crossorigin="anonymous"></script>

    <title>Index</title>
  </head>

  <body>
    <div class="content" id="head">      

      <div class="card" id="frame_up">
        <div class="card-header" id="content-header">
          <img class="logo" src="<?php echo HOME_IMG.'/logo1.png'; ?>">

          <?php 
            if(isset($_SESSION['id']) && isset($_SESSION['name_user'])){ ?>
              <div style="float:right;margin-right: 80px; margin-top: 20px;">            
                <a href="home/logout">
                  <i class="fas fa-sign-out-alt fa-2x"></i>
                </a> 
                <p>Sair</p>           
              </div>
            <?php
            }
          ?>
        </div>                
      </div> 
     </div>

  
