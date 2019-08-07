<?php

  $app->post('/employeeJWT','ServicesController:selectEmployee');

  $app->post('/login','ServicesController:selectUser');

  $app->post('/tokenEmployee','ServicesController:tokenEmployee');

?>
