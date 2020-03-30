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

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'dnadevendas' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'root' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

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

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
