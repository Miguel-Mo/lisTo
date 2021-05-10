<?php

// Configuracion de acceso a la base de datos
// define('DB_HOST', '51.75.233.121');
// define('DB_USUARIO', 'admin_casakiki');
// define('DB_PASSWORD', 'Admin_casakiki2020$');
// define('DB_NOMBRE', 'admin_casakiki');

define('DB_HOST', '127.0.0.1:3307');
define('DB_USUARIO', 'root');
define('DB_PASSWORD', '');
define('DB_NOMBRE', 'admin_listo');

// Ruta de la aplicacion
define('RUTA_APP', dirname(dirname(__FILE__)));

define('RUTA_URL', 'http://localhost/lisTo');
//define('RUTA_URL', 'https://cmdatos.com');

// NOMBRE DEL SITIO
define('NOMBRE_SITIO', 'LisTo');

// NOMBRE DEL SITIO
define('LOGO', RUTA_URL.'/public/img/favicon.png');
define('ICON', RUTA_URL.'/public/img/favicon.png');

// ALMACENAMIENTO
define('MAX_BYTES_STORAGE', '5G');
define('UPLOADS_PATH', '../uploads/');
define('EXPORT_PATH', '../public/temp/');
