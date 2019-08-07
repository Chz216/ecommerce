<?php

  namespace app\Controllers;

  class EmployeesController extends Controllers {

    function selectEmployees($request, $response){
      $message = $this->EmployeesModel->selectEmployees();
      return json_encode($message);
    }

    function selectEmployee($request, $response){
      $employeeNumber = $request->getAttribute('employeeNumber');
      $message = $this->EmployeesModel->selectEmployee($employeeNumber);
      return json_encode($message);
    }

    function cityOffice($request, $response){
      $message = $this->EmployeesModel->cityOffice();
      return json_encode($message);
    }

    function insertEmployees($request, $response){
      $employee = $request->getParsedBody();
      $message = $this->EmployeesModel->insertEmployees($employee);
      return json_encode($message);
    }

    function updateEmployees($request, $response,$id_employee){
      $employee = $request->getParsedBody();
      $message = $this->EmployeesModel->updateEmployees($employee,$id_employee);
      return json_encode($message);
    }

 }

?>
