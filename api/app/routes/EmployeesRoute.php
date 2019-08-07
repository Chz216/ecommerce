<?php

  $app->get('/employees','EmployeesController:selectEmployees');

  $app->get('/employee/{employeeNumber}','EmployeesController:selectEmployee');

  $app->get('/officeEmployees','EmployeesController:cityOffice');

  $app->post('/employees','EmployeesController:insertEmployees');

  $app->post('/employee','EmployeesController:insertEmployee');

  $app->put('/employees/{id_employee}','EmployeesController:updateEmployees');


?>
