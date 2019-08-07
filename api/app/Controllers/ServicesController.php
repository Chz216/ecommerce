<?php

  namespace app\Controllers;

  class ServicesController extends Controllers {

    function selectEmployee($request, $response){
      $employee = $request->getParsedBody();
      $message = $this->JsonWebToken->selectEmployee($employee);
      return $message;
    }

    function selectUser($request, $response){
      $employee = $request->getParsedBody();
      $message = $this->JsonWebToken->selectUser($employee);
      return $message;
    }

    function tokenEmployee($request, $response){
      $employee = $request->getParsedBody();
      $message = $this->JsonWebToken->tokenEmployee($employee);
      return $message;
    }

  }

?>
