<?php

  namespace app\Controllers;

  class Controllers {
    public function __construct($container) {
      $this->container = $container;
    }

    public function __get($property) {
      if ($this->container->{$property}) {
        return $this->container->{$property};
      }
    }

    public function getObject($params){
      return (object)params;
    }
  }

?>
