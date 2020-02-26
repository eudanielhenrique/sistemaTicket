<?php

  if ( ! defined('ABSPATH')) exit;
  require_once ABSPATH.'/class/class-Actions.php';
  
  $action = new Actions();
  $action->valida_login();
  
?>

<div class="card text-center align-items-center">
  <div class="card-body">
    <h5 class="card-title">Vamos começar? Faça seu login</h5>
  </div>

  <form action="" method="post">
    <input type="hidden" name="usuarionaologado">

    <div class="form-group">
      <!-- Email -->
      <label for="exampleInputEmail1">Endereço de email</label>
      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">
      <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
    </div>

    <!-- Senha -->
    <div class="form-group">
      <label for="exampleInputPassword1">Senha</label>
      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Senha">
      <small id="passwordHelpInline" class="text-muted"> Deve ter entre 8 e 20 caracteres. </small>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="button" class="btn btn-danger">Cadastrar</button>
  </form>
</div>

