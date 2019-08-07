<?php

  namespace app\services;

  class JsonWebToken extends services{

    function tokenEmployee($employee){
      $employee['password'] = $this->jwt->encode($employee['password'], $this->settings['jwt']['key']);
      $message = $this->EmployeesModel->insertEmployee($employee);
      return json_encode($message);
    }

    function selectEmployee($employee){
      if (isset($employee['employeeNumber'])) {
        $message = $this->EmployeesModel->selectEmployee($employee);
        $message['tokenUser'] = $this->jwt->encode($employee['employeeNumber'], $this->settings['jwt']['key']);
      }
      return json_encode(array('result' => $message));
    }

    function selectUser($employee){
      $employee['password'] = $this->jwt->encode($employee['password'], $this->settings['jwt']['key']);
      $message = $this->EmployeesModel->selectUser($employee);
      return json_encode($message);
    }

  }

?>
