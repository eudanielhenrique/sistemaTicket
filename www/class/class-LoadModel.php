<?php
/**
 * LoadModel - Todos os controllers deverão estender essa classe
 *
 * @package SistemaTicket
 */
class LoadModel 
{
  public $db,$title, $login_required = false;

	public $permission_required = 'any';

	public $parametros = array();
	
	/**
	 * Load model
	 *
	 * Carrega os modelos 
	 *
	 * @since 0.1
	 * @access public
	 */
  public function load_model($model_name = false)
  {

		// Um arquivo deverá ser enviado
		if (!$model_name ) return;

		// Garante que o nome do modelo tenha letras minúsculas
		$model_name =  strtolower($model_name);

		// Inclui o arquivo
		$model_path = ABSPATH . '/src/models/' . $model_name . '.php';

		// Verifica se o arquivo existe
    if (file_exists($model_path))
    {
			// Inclui o arquivo
			require_once $model_path;

			// Remove os caminhos do arquivo (se tiver algum)
			$model_name = explode('/', $model_name);

			// Pega só o nome final do caminho
			$model_name = end($model_name);

			// Verifica se a classe existe
      if (class_exists($model_name))
      {
				// Retorna um objeto da classe
				return new $model_name($this->db, $this );
      }

			return;

		}
	}
}
