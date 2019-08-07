<?php
//configuración de la base de trader_cdlrisefall3methods
$db = require $contexto_app . '/app/database/config.php';

//agregar configuración  para llave de encriptación
$jwt = array('key' => 'UX9{8t_)Rg#hLd@n', 'algorithms' => array('HS256'));

//configuración de la app
$settings = array(
  'displayErrorDetails' => true,
  'determineRouteBeforeAppMiddleware' => true,
  'db' => $db,
  'jwt' => $jwt
);

//se agrega el contexto de al app

$settings['contexto'] = $contexto_app;

return $settings;

?>
