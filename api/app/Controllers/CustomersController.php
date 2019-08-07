<?php

  namespace app\Controllers;

  class CustomersController extends Controllers {

    function selectCustomers($request, $response){
      $message = $this->CustomersModel->selectCustomers();
      return json_encode($message);
    }

    function insertCustomers($request, $response){
      $customer = $request->getParsedBody();
      $message = $this->CustomersModel->insertCustomers($customer);
      return json_encode($message);
    }

    function updateCustomers($request, $response,$id_customer){
      $customer = $request->getParsedBody();
      $message = $this->CustomersModel->updateCustomers($customer,$id_customer);
      return json_encode($message);
    }

 }

?>
