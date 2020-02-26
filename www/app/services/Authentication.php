<?php

  class Authentication {

    public function autenticar($email, $password){
      
      if($email != false && $password != false){
        require '../models/LoginModel.php';
        $model = new LoginModel();

        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);

        if($model->login($email, $password) == true)
        {
          if(isset($_SESSION['id']) && isset($_SESSION['email']))
          {
            return true;
          }else{
            return false;
          }
        }else{
          return false;
        }

      }else{
        return false;
      }
    }
  }

?>