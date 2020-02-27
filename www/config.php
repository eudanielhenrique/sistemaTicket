<?php
/**
 * Configuração geral
 */

// Caminho para a raiz
define( 'ABSPATH', dirname( __FILE__ ) );


// URL da home
define( 'HOME_URI', 'localhost:8001' );

// Nome do host da base de dados
define( 'HOSTNAME', 'localhost' );

define( 'HOME_FILE', 'resources/css/estilo.css' );

define ( 'HOME_IMG', 'resources/image' );


// Se você estiver desenvolvendo, modifique o valor para true
define( 'DEBUG', true );

/**
 * Não edite daqui em diante
 */

// Carrega o loader, que vai carregar a aplicação inteira
require_once ABSPATH . '/loader.php';
?>
