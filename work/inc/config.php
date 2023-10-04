<?php
define('DB_NAME', 'plg_log');
define('DB_USER', 'adm_plg');
define('DB_PASSWORD', 'adm123');
define('DB_HOST', 'mysql');  //

define('DB_NAME_ADM', 'plg_log_adm');
define('DB_USER_ADM', 'adm_plg');
define('DB_PASSWORD_ADM', 'adm123');

if (!defined('ABSPATH')){
    define('ABSPATH', __DIR__);
}

define('ROOT_PATH', dirname(__FILE__));

if (!defined('DBAPI')){
    define('DBAPI', ABSPATH . '/conexao.php');
}
?>
