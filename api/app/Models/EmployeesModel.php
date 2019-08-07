<?php

  namespace app\Models;

  class EmployeesModel extends Models{

    function selectEmployees() {
      $result = $this->db->select('employees',[
        'employeeNumber',
        'lastName',
        'firstName',
        'extension',
        'email',
        'password',
        'officeCode',
        'reportsTo',
        'jobTitle'
      ]);

      if(!is_null($this->db->error()[1])){
        return array(
          'error' => true,
          'description' => $this->db->error()[2]
        );
      }else if (empty($result)) {
        return array(
          'NotFound' => true,
          'description' => 'The result is empty'
        );
      }

      return array(
        'success' => true,
        'description' => 'The employees were found',
        'employees' => $result
      );
    }

    function selectEmployee($employee) {
      $result = $this->db->pdo->prepare("SELECT lastName, firstName, extension, email, password, officeCode, reportsTo, jobTitle FROM employees WHERE employeeNumber=:employeeNumber");
      $result->bindParam(':employeeNumber', $employee['employeeNumber'], \PDO::PARAM_INT);
      $result->execute();
      $employee = $result->fetchAll(\PDO::FETCH_OBJ);

      if(!is_null($result->errorInfo()[1])){
        return array(
          'error' => true,
          'description' => $result->errorInfo()[2]
        );
      }else if (empty($employee)) {
        return array(
          'NotFound' => true,
          'description' => 'The result is empty'
        );
      }

      return array(
        'success' => true,
        'description' => 'The employee was found',
        'employee' => $employee
      );
    }

    function selectUser($employee) {
      $result = $this->db->pdo->prepare("SELECT lastName, firstName, email, password FROM employees WHERE email=:email AND password=:password");
      $result->bindParam(':email', $employee['email'], \PDO::PARAM_STR);
      $result->bindParam(':password', $employee['password'], \PDO::PARAM_STR);

      $result->execute();

      $employee = $result->fetchAll(\PDO::FETCH_OBJ);

      if(!is_null($result->errorInfo()[1])){
        return array(
          'error' => true,
          'description' => $result->errorInfo()[2]
        );
      }else if (empty($employee)) {
        return array(
          'NotFound' => true,
          'description' => 'the employee is not registered'
        );
      }

      return array(
        'success' => true,
        'description' => 'The employees were found',
        'employee' => $employee
      );
    }

    function cityOffice() {

      $result = $this->db->select('employees',[
        '[>]offices' => ['officeCode'=>'officeCode']
      ],[
        'employeeNumber',
        'lastName',
        'firstName',
        'extension',
        'email',
        'city',
        'reportsTo',
        'jobTitle'
      ]);

      if(!is_null($this->db->error()[1])){
        return array(
          'error' => true,
          'description' => $this->db->error()[2]
        );
      }else if (empty($result)) {
        return array(
          'NotFound' => true,
          'description' => 'The result is empty'
        );
      }

      return array(
        'success' => true,
        'description' => 'The employees were found',
        'employees' => $result
      );
    }

    function insertEmployees($employee){
      $result = $this->db->insert('employees',[
        'employeeNumber' => $employee['employeeNumber'],
        'lastName' => $employee['lastName'],
        'firstName' => $employee['firstName'],
        'extension' => $employee['extension'],
        'email' => $employee['email'],
        'officeCode' => $employee['officeCode'],
        'reportsTo' => $employee['reportsTo'],
        'jobTitle' => $employee['jobTitle']
      ]);

      if(!is_null($this->db->error()[1])){
        return array(
          'success' => true,
          'description' => $this->db->error()[2]
        );
      }

      return array(
        'success' => true,
        'description' => 'The employee was inserted!!',
      );
    }

    function insertEmployee($employee){
      $result = $this->db->pdo->prepare("INSERT INTO employees(employeeNumber, lastName, firstName, extension, email, password, officeCode, reportsTo, jobTitle)
                                          VALUES (:employeeNumber, :lastName, :firstName, :extension, :email, :password, :officeCode, :reportsTo, :jobTitle)");
      $result->bindParam(':employeeNumber', $employee['employeeNumber'], \PDO::PARAM_INT);
      $result->bindParam(':lastName', $employee['lastName'], \PDO::PARAM_STR);
      $result->bindParam(':firstName', $employee['firstName'], \PDO::PARAM_STR);
      $result->bindParam(':extension', $employee['extension'], \PDO::PARAM_STR);
      $result->bindParam(':email', $employee['email'], \PDO::PARAM_STR);
      $result->bindParam(':password', $employee['password'], \PDO::PARAM_STR);
      $result->bindParam(':officeCode', $employee['officeCode'], \PDO::PARAM_STR);
      $result->bindParam(':reportsTo', $employee['reportsTo'], \PDO::PARAM_INT);
      $result->bindParam(':jobTitle', $employee['jobTitle'], \PDO::PARAM_STR);

      $result->execute();

      if(!is_null($result->errorInfo()[1])){
        return array(
          'success' => true,
          'description' => $result->errorInfo()[2]
        );
      }

      return array(
        'success' => true,
        'description' => 'The employee was inserted!!',
      );
    }

    function updateEmployees($employee,$id_employee){
      $result = $this->db->update('employees',[
        'lastName' => $employee['lastName'],
        'firstName' => $employee['firstName'],
        'extension' => $employee['extension'],
        'email' => $employee['email'],
        'officeCode' => $employee['officeCode'],
        'reportsTo' => $employee['reportsTo'],
        'jobTitle' => $employee['jobTitle']
      ],[
        'employeeNumber' => $id_employee
      ]);

      if(!is_null($this->db->error()[1])){
        return array(
          'success' => true,
          'description' => $this->db->error()[2]
        );
      }

      return array(
        'success' => true,
        'description' => 'The employee was updated!!',
      );
    }

  }

?>
