<?php

  $app->get('/greetings','UserController:helloUser');

  $app->get('/hello/{name}','UserController:hello');


?>
