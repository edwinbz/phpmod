<?php
define("ROOT_DEV", "phpmod/");
define("ROOT_PRO", "");
define('DOMAIN_PRO', 'phpmod.epizy.com');
define("DEFAULT_VIEW", 'inicio');

#PHP
setlocale(LC_ALL, "es_ES");
setlocale(LC_TIME, 'es_ES');
date_default_timezone_set('America/Bogota');
$fecha = new DateTime();

#APP
define('APP_NAME', 'PHPMod');
define("APP_DESCRIPTION", "PHP Modular Template");
define("APP_VERSION", "1.0.0");
define("APP_AUTOR", "Edwin Bautista");
define("APP_AUTOR_WEBSITE", "mailto:edwinbz@outlook.com");
define("APP_INSTALLED", "01/09/2019");
define("APP_UPDATED", "01/09/2019");
define("APP_YEAR", date('Y'));
define("APP_TIMESTAMP", $fecha->getTimestamp());
define("APP_DEBUG", true);
define('APP_PRO', ("$_SERVER[HTTP_HOST]" == DOMAIN_PRO)); // Automatic detection of production mode
define("APP_HOSTS", array('localhost', '192.168.0.13', '127.0.0.1', '192.168.0.15', 'phpmod.epizy.com')); // Comm hosts allowed
define('APP_ORIGINS', array('http://localhost', 'https://phpmod.epizy.com', 'http://192.168.0.15'));
define('APP_KEY', 'c5b2b98e9fa644d9b6fe0b2235da225d');
define("APP_ROOT", (APP_PRO) ? ROOT_PRO : ROOT_DEV);

#URL HOST
define("HOST", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" . APP_ROOT);
define('URI', "$_SERVER[REQUEST_URI]");

#Client
define("CLIENT_ID", "C1");
define("CLIENT_NAME", "Cliente");
define("CLIENT_ESLOGAN", "Eslogan del cliente");
define("CLIENT_LOGO", HOST . "www/img/logo.svg");
define("CLIENT_THEMECOLOR", "#f8f9fa");

#Views versions
define("SCRIPT_VERSION", "?v=" . APP_TIMESTAMP);
define("STYLE_VERSION", "?v=" . APP_TIMESTAMP);

#Database Development
define('DBD_HOST', 'localhost');
define("DBD_USER", "root");
define("DBD_PASS", "");
define("DBD_NAME", "phpmod");

#Database Production
define('DBP_HOST', 'sql110.epizy.com');
define("DBP_USER", "epiz_27778472");
define("DBP_PASS", "Sc5Ucx26pcDEp7");
define("DBP_NAME", "epiz_27778472_phpmod");

#Database Mode
define('DB_HOST', (APP_PRO) ? DBP_HOST : DBD_HOST);
define("DB_USER", (APP_PRO) ? DBP_USER : DBD_USER);
define("DB_PASS", (APP_PRO) ? DBP_PASS : DBD_PASS);
define("DB_NAME", (APP_PRO) ? DBP_NAME : DBD_NAME);

#PHPMailer
define('SMTP_HOST', 'mail.phpmod.com');
define('SMTP_PORT', 25);
define('SMTP_USER', 'soporte@phpmod.com');
define('SMTP_PASS', 'fD_5bK1#uPCF8v@n');
define('SMTP_FROM', 'soporte@phpmod.com');
define('SMTP_ALIAS', 'Soporte - ' . APP_NAME);

#Directories
define("APP", "src/app/");
define("MOD", "src/modules/");
define("PLU", "src/plugins/");
define("INC", "src/include/");
define('FILE', "files/");
define('ERR', 'src/errors/');
define("WWW", HOST . "www/");
define("LIB", HOST . "www/lib/");
define("JS", HOST . "www/js/");
define("CSS", HOST . "www/css/");
define("IMG", HOST . "www/img/");

#Response Types
define('RES_FETCH_ASSOC', 1);
define('RES_FETCH_NUM', 2);
define('RES_ROW_COUNT', 3);
define('RES_LAST_ID', 4);

#Operation Types
define('OPE_CREATE', 1);
define('OPE_READ', 2);
define('OPE_UPDATE', 3);
define('OPE_DELETE', 4);

#Response Code Types
define('SUCCESS', 0);
define('ERROR_APP', 1);
define('ERROR_PDO', 2);

# https://github.com/edwinbz/phpmod