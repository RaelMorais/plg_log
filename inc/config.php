<?php

define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', '');

define('DB_NAME_ADM', '');
define('DB_USER_ADM', 'adm_');
define('DB_PASSWORD_ADM', '');

if (!defined('ABSPATH')){
    define('ABSPATH', __DIR__);
}

define('ROOT_PATH', dirname(__FILE__));

if (!defined('DBAPI')){
    define('DBAPI', ABSPATH . '/conexao.php');
}
