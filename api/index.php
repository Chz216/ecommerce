<?php
  header ('Access-Control-Allow-Credentials: true');
  header ('Access-Control-Allow-Origin: *');
  header ('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
  header ('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Method, Authorization');

session_start();

//directorio de la aplicación
$contexto_app = __DIR__;

//establecer el entorno de la aplicación
$env = 'development'; //production or development

//agregar la configuración de la app
require $contexto_app . '/app/app.php';

?>
