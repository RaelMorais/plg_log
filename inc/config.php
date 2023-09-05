<?php

define('DB_NAME_ADM', 'plg_log_adm');
define('DB_NAME', 'plg_log');
define('DB_USER_ADM', 'adm_plg_log');
define('DB_PASSWORD_ADM', 'adm123');
define('DB_USER', 'user_plg');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');


if (!defined('ABSPATH')){
    define('ABSPATH', __DIR__);
}

define('ROOT_PATH', dirname(__FILE__));

if (!defined('DBAPI')){
    define('DBAPI', ABSPATH . '/conexao.php');
}
