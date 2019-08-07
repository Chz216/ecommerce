<?php

  namespace app\Controllers;

  class ProductsController extends Controllers {

    function selectProducts($request, $response){
      $message = $this->ProductsModel->selectProducts();
      return json_encode($message);
    }

    function insertProducts($request, $response){
      $product = $request->getParsedBody();
      $message = $this->ProductsModel->insertProducts($product);
      return json_encode($message);
    }


    function updateProducts($request, $response, $id_product){
      $product = $request->getParsedBody();
      $message = $this->ProductsModel->updateProducts($product, $id_product);
      return json_encode($message);
    }

 }

?>
