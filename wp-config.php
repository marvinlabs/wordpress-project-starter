<?php	
//*************************************************************************************************************
// APP CONFIGURATION STARTS HERE
//--
$app_name 	= 'my_app_name';
$db_servers = array(
		'dev' => array( 
				'name'		=> $app_name,
				'user'		=> $app_name,
				'pass'		=> '',
				'host'		=> '127.0.0.1'
			),
		'test' => array( 
				'name'		=> '',
				'user'		=> '',
				'pass'		=> '',
				'host'		=> ''
			),
		'prod' => array( 
				'name'		=> '',
				'user'		=> '',
				'pass'		=> '',
				'host'		=> ''
			)
	);
$web_servers = array(
		'dev' 	=> array( 
				'hosts'			=> array( '127.0.0.1', 'localhost' ),
				'use_subfolder'	=> true
			),
		'test' 	=> array( 
				'hosts'			=> array(),
				'use_subfolder'	=> true
			),
		'prod' 	=> array( 
				'use_subfolder'	=> false
			),
	);

// GLOBAL CODE TO RUN ON ANY ENVIRONMENT
//--

define('AUTH_KEY',         ';0{01+0|-X| ^quJpH^QFcUQ.km |#|X0dyhVs3y.Bj?U1>-7h,H-qm$+TaO>%-[');
define('SECURE_AUTH_KEY',  '! [?8=gjEP7$oPMzZxd[hVxEmk/Ijs`YsL %w,5rAa9ZAL(ipewj_^[Dq7SLf{uW');
define('LOGGED_IN_KEY',    '_T@-+;t{~@IzM2RG_/IVV}GynZ+}HF@7z!7 N(@pGaV7[L xL-b-MxB^Aaz:W`WD');
define('NONCE_KEY',        ':iKw4iG{ec3Tsj..92{lK$Z7/,[DU{T+J[SI*to^z^68NyG:.|Y+$jD+j| R t^,');
define('AUTH_SALT',        '7Z2Vv[Eb:|1ymU95O>|S0H&U|P{{hFA{BF-}Wc]x}*=@W^RcU~)O=NLYyLQRX*nU');
define('SECURE_AUTH_SALT', '/#U_4AFH)Fg~L(By+Xh{l^e.zQ&^&:WmWT%eM6n:{,X+[B*X9/t]NrLRGtspB2eX');
define('LOGGED_IN_SALT',   'UEv{bLiu~y&+>!u2.B2(*@lmk[+lcOe}<b~=g<y.k!AsYe/+T}(+0ZrP{<Z4A9{d');
define('NONCE_SALT',       '*S1XSc(|_=:i`+8;a!%V^(![SnC&hg$nb+GY)?+ 5(XK1]`.G?eV;uSc5E>]`b?2');

// SPECIFIC CODE TO RUN DEPENDING ON ENVIRONMENT
//--
if ( in_array( $_SERVER['SERVER_NAME'], $web_servers['dev']['hosts'] ) ) {
	define( 'WP_ENV', 'dev' ); 
	define( 'DISABLE_WP_CRON', true );	
	define( 'WP_DEBUG', true );
	
} else if ( in_array( $_SERVER['SERVER_NAME'], $web_servers['test']['hosts'] ) ) {
	define( 'WP_ENV', 'test' ); 
	define( 'WP_DEBUG', true );
	
} else {
	define( 'WP_ENV', 'prod' ); 
	define( 'DISALLOW_FILE_EDIT', true );
	
} 
	
//*************************************************************************************************************	
// THE REST IS AUTOMATICALLY DONE, DON'T EDIT BELOW THAT LINE
//--
$table_prefix  = 'wp_' . $app_name . '_';

define('DB_NAME', 		$db_servers[WP_ENV]['name']);
define('DB_USER', 		$db_servers[WP_ENV]['user']);
define('DB_PASSWORD', 	$db_servers[WP_ENV]['pass']);
define('DB_HOST', 		$db_servers[WP_ENV]['host']);
define('DB_CHARSET', 	'utf8');
define('DB_COLLATE', 	'');

if ( $web_servers[WP_ENV]['use_subfolder']===true ) {
	define( 'WP_SITEURL', 		'http://' . $_SERVER['SERVER_NAME'] . '/' . $app_name . '/wordpress' );
	define( 'WP_HOME', 			'http://' . $_SERVER['SERVER_NAME'] . '/' . $app_name . '/' );
	define( 'WP_CONTENT_URL',	'http://' . $_SERVER['SERVER_NAME'] . '/' . $app_name . '/wp-content');
	define( 'WP_PLUGIN_URL',	'http://' . $_SERVER['SERVER_NAME'] . '/' . $app_name . '/wp-content/plugins');
} else {
	define('WP_SITEURL', 		'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
	define('WP_HOME',    		'http://' . $_SERVER['SERVER_NAME'] );
	define('WP_CONTENT_URL', 	'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');
	define('WP_PLUGIN_URL', 	'http://' . $_SERVER['SERVER_NAME'] . '/wp-content/plugins');
}

define( 'WP_CONTENT_DIR', 	dirname(__FILE__) . '/wp-content');
define( 'WP_PLUGIN_DIR', 	dirname(__FILE__) . '/wp-content/plugins');
define( 'PLUGINDIR', 		dirname(__FILE__) . '/wp-content/plugins');

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
