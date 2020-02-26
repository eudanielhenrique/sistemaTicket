<?php

class RequestForm {
  public function form_ticket_store(){

    $id_list = (isset($_POST['assunto']) && !empty($_POST['assunto'])) 
      ? $_POST['assunto'] : false;
    
    $id_sale = (isset($_POST['venda']) && !empty($_POST['venda'])) 
      ? $_POST['venda'] : false;
    
    $description = (isset($_POST['motivo']) && !empty($_POST['motivo'])) 
      ? $_POST['motivo'] : false;

    
    if($id_list == false || $id_sale == false || strlen($description) == 0){
      $this->messagem_campoVazio();
    }

    $_POST['motivo'] = $this->sanitizeString($description);
    $this->tamanho($_POST['motivo']);
    
    return true;    
  }

  public function sanitizeString($str) {
    $str = preg_replace('/[áàãâä]/ui', 'a', $str);
    $str = preg_replace('/[éèêë]/ui', 'e', $str);
    $str = preg_replace('/[íìîï]/ui', 'i', $str);
    $str = preg_replace('/[óòõôö]/ui', 'o', $str);
    $str = preg_replace('/[úùûü]/ui', 'u', $str);
    $str = preg_replace('/[ç]/ui', 'c', $str);
    $str = preg_replace('/[^a-z0-9]/i', '_', $str);
    $str = preg_replace('/_+/', '_', $str); 
    return $str;
  }

  public function tamanho($texto){
    if(strlen($texto) > 40){
      $this->mensagem_tamanho();
    }    
  }

  /*Mensagens: */
  public function messagem_campoVazio(){
    echo "<meta http-equiv='refresh' content='0;URL=../ticket/store'/>

            <script type=\"text/javascript\">
            alert(\"Informe todos campos\");
            </script> ";
  }

  public function mensagem_tamanho() {
    echo "<meta http-equiv='refresh' content='0;URL=../ticket/store'/>

            <script type=\"text/javascript\">
            alert(\"Tamanho máximo 40 letras no motivo\");
            </script> ";
  }
}

?>