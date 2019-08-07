<?php

  namespace app\Models;

  class OfficesModel extends Models{

    function selectOffices() {

      $result = $this->db->pdo->prepare('SELECT officeCode, city, phone, addressLine1, addressLine2, state, country, postalCode, territory FROM offices');

      $result->execute();

      $offices = $result->fetchAll(\PDO::FETCH_ASSOC);

      if(!is_null($result->errorInfo()[1])){
        return array(
          'error' => true,
          'description' => $result->errorInfo()[2]
        );
      }else if (empty($result)) {
        return array(
          'NotFound' => true,
          'description' => 'The result is empty'
        );
      }

      return array(
        'success' => true,
        'description' => 'The offices were found',
        'offices' => $offices
      );
    }

    function insertOffices($office){
      $result = $this->db->pdo->prepare("INSERT INTO offices(officeCode, city, phone, addressLine1, addressLine2, state, country, postalCode, territory)
                                         VALUES (:officeCode, :city, :phone, :addressLine1, :addressLine2, :state, :country, :postalCode, :territory)");
      $result->bindParam(':officeCode', $office['officeCode'], \PDO::PARAM_STR);
      $result->bindParam(':city', $office['city'], \PDO::PARAM_STR);
      $result->bindParam(':phone', $office['phone'], \PDO::PARAM_STR);
      $result->bindParam(':addressLine1', $office['addressLine1'], \PDO::PARAM_STR);
      $result->bindParam(':addressLine2', $office['addressLine2'], \PDO::PARAM_STR);
      $result->bindParam(':state', $office['state'], \PDO::PARAM_STR);
      $result->bindParam(':country', $office['country'], \PDO::PARAM_STR);
      $result->bindParam(':postalCode', $office['country'], \PDO::PARAM_STR);
      $result->bindParam(':territory', $office['territory'], \PDO::PARAM_STR);

      $result->execute();

      if(!is_null($result->errorInfo()[1])){
        return array(
          'success' => true,
          'description' => $result->errorInfo()[2]
        );
      }
      return array(
        'success' => true,
        'description' => 'The office was inserted!!',
      );
    }

    function updateOffices($office, $id_office){
      $result = $this->db->pdo->prepare("UPDATE offices SET city=:city, phone=:phone, addressLine1=:addressLine1, addressLine2=:addressLine2, state=:state,
                                         country=:country, postalCode=:postalCode, territory=:territory WHERE officeCode=:officeCode");
      $result->bindParam(':officeCode', $office['officeCode'], \PDO::PARAM_STR);
      $result->bindParam(':city', $office['city'], \PDO::PARAM_STR);
      $result->bindParam(':phone', $office['phone'], \PDO::PARAM_STR);
      $result->bindParam(':addressLine1', $office['addressLine1'], \PDO::PARAM_STR);
      $result->bindParam(':addressLine2', $office['addressLine2'], \PDO::PARAM_STR);
      $result->bindParam(':state', $office['state'], \PDO::PARAM_STR);
      $result->bindParam(':country', $office['country'], \PDO::PARAM_STR);
      $result->bindParam(':postalCode', $office['country'], \PDO::PARAM_STR);
      $result->bindParam(':territory', $office['territory'], \PDO::PARAM_STR);
      $result->bindParam(':officeCode', $id_office['id_office'], \PDO::PARAM_STR);

      $result->execute();

      if(!is_null($result->errorInfo()[1])){
        return array(
          'success' => true,
          'description' => $result->errorInfo()[2]
        );
      }
      return array(
        'success' => true,
        'description' => 'The office was updated!!',
      );
    }

  }

?>
