<?php

  namespace app\Models;

  class ProductsModel extends Models{

    function selectProducts() {

      $result = $this->db->select('products',[
        'productCode',
        'productName',
        'productLine',
        'productScale',
        'productVendor',
        'productDescription',
        'quantityInStock',
        'buyPrice',
        'MSRP'
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
        'products' => $result
      );
    }

    function insertProducts($product){
      $result = $this->db->insert('products',[
        'productCode' => $product['productCode'],
        'productName' => $product['productName'],
        'productLine' => $product['productLine'],
        'productScale' => $product['productScale'],
        'productVendor' => $product['productVendor'],
        'productDescription' => $product['productDescription'],
        'quantityInStock' => $product['quantityInStock'],
        'buyPrice' => $product['buyPrice'],
        'MSRP' => $product['MSRP']
      ]);

      if(!is_null($this->db->error()[1])){
        return array(
          'success' => true,
          'description' => $this->db->error()[2]
        );
      }

      return array(
        'success' => true,
        'description' => 'The product was inserted!!',
      );
    }

    function updateProducts($product,$id_product){
      $result = $this->db->update('products',[
        'productName' => $product['productName'],
        'productLine' => $product['productLine'],
        'productScale' => $product['productScale'],
        'productVendor' => $product['productVendor'],
        'productDescription' => $product['productDescription'],
        'quantityInStock' => $product['quantityInStock'],
        'buyPrice' => $product['buyPrice'],
        'MSRP' => $product['MSRP']
      ],[
        'productCode' => $id_product
      ]);

      if(!is_null($this->db->error()[1])){
        return array(
          'success' => true,
          'description' => $this->db->error()[2]
        );
      }

      return array(
        'success' => true,
        'description' => 'The product was updated!!',
      );
    }

  }

?>
