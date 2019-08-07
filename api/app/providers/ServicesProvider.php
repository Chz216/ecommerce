<?php
//se agrega los controllers al contexto de la app (container)
  $container['JsonWebToken'] = function($container) {
    return new app\services\JsonWebToken($container);
  };

?>
