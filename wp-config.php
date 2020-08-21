<?php


/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

/* Não Alterar o código abaixo */
$dbhost = ''; /* Deixar em branco para utilizar o padrão (automático) */
$dbuser = ''; /* Deixar em branco para utilizar o padrão (automático) */
$dbpassword = ''; /* Deixar em branco para utilizar o padrão (automático) */

$server_addr = $_SERVER['SERVER_ADDR'];
switch ($server_addr) {
    case '::1':
    case '127.0.0.1':
        $dbhost_default = 'localhost';
        $dbname = 'wp_dnadevendas';
        $dbuser_default = 'root';
        $dbpassword_default = 'root';
        $cache = false;
        define('DEV_MODE', true);
        define('WP_DEBUG', true);
        define('WP_DEBUG_DISPLAY', true );
        define('WP_HOME','http://dna-de-vendas.localhost/');
        define('WP_SITEURL','http://dna-de-vendas.localhost/');
        break;

    case '172.31.29.159':
        $dbhost_default = 'pro-ciapipe.c6kc9wk9fak1.us-west-2.rds.amazonaws.com';
        $dbname = 'wp_dnadevendas';
        $dbuser_default = 'root';
        $dbpassword_default = 'fZBy8NhelGwQNS';
        $cache = true;
        define('DEV_MODE', false);
        define('WP_HOME','https://dnaformarketing.com.br/dna-de-vendas/');
        define('WP_SITEURL','https://dnaformarketing.com.br/dna-de-vendas/');
        break;

    case '198.199.88.130':
        $dbhost_default = 'ddb-mysql-nyc1-74097-do-user-787860-0.db.ondigitalocean.com:25060';
        $dbname = 'wp_dnadevendas';
        $dbuser_default = 'wordpressuser';
        $dbpassword_default = '53kmqydsxob789a'; 
        $cache = true;
        define('DEV_MODE', true);
        // define('WP_DEBUG', true);
        // define('WP_DEBUG_DISPLAY', true );
        define('WP_HOME','https://www.dnadevendas.com.br/');
        define('WP_SITEURL','https://www.dnadevendas.com.br/');
        break;
    
    default:
		$dbhost_default = 'ddb-mysql-nyc1-74097-do-user-787860-0.db.ondigitalocean.com:25060';
		$dbname = 'wp_dnadevendas';
		$dbuser_default = 'wordpressuser';
		$dbpassword_default = '53kmqydsxob789a'; 
        $cache = true;
		define('DEV_MODE', true);
		// define('WP_DEBUG', true);
		// define('WP_DEBUG_DISPLAY', true );
		define('WP_HOME','https://www.dnadevendas.com.br/');
		define('WP_SITEURL','https://www.dnadevendas.com.br/');
		break;
}

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
define('DB_NAME', $dbname);
/** Usuário do banco de dados MySQL */
define('DB_USER', ($dbuser != '') ? $dbuser : $dbuser_default);
/** Senha do banco de dados MySQL */
define('DB_PASSWORD', ($dbpassword != '') ? $dbpassword : $dbpassword_default);
/** nome do host do MySQL */
define('DB_HOST', ($dbhost != '') ? $dbhost : $dbhost_default);
// habilita o uso de cache pelo wordpres
define('WP_CACHE', $cache);
/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');
/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');
define( 'FS_METHOD', 'direct' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '$ld>gX*~HPs)]VWDGIaRBj~YnQ*&^[z%*eH!+g>c(hrM~[Xpz,Z]~]q(?xv*%EwP' );
define( 'SECURE_AUTH_KEY',  'p bm2~dt_$+&^mg2UD0naO/3rD0*6{Fx]}r]MekwyFh<0v{Ff, DzDWapfX{!fyR' );
define( 'LOGGED_IN_KEY',    '8ZBLD5O`7ks|~>]Z:S6nom=-; $L^UTvY_5nJ6W)uP9on#r7I6TXE8gd~eA>rvGI' );
define( 'NONCE_KEY',        'l&m0j0cN6GwL0Ck59[C{r)0xm*cYNjBm6NJi&U}`Mv<HKkQOW.Ax#BIHp[I4x1~Q' );
define( 'AUTH_SALT',        'YpR&;|_8JMny6@^ ~L?`8#4}:wQK.K<ljKr+q9EfyS,e.seY5j#723s{Nr}pc[p!' );
define( 'SECURE_AUTH_SALT', 'S(44@ NnrraH%5H?xzUPL%d0pQM:/p<0DlD0s{#7z2*- g7KD2|>ZB=~lf56uq$F' );
define( 'LOGGED_IN_SALT',   ';MU!w-2:`%u()(wMfR@qe6ZtMZ?=lw3Fn1k3;kPvjB/0R{=b+SD*FcJ,D$&FT/B7' );
define( 'NONCE_SALT',       'U_:?5_*fT9mugJF,G4Ta|CAwkx!GFghI2<7S{}#cl9)!2)3}q}iGVy|)4!2Z3_>v' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';


/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
