<?php

  namespace app\Controllers;

  class UserController extends Controllers {

    function helloUser($request, $response) {
      return json_encode(array('greetings' => 'Hello from the other side!!'));
    }

    function hello($request, $response) {
      $name = $request->getAttribute('name');
      $message['name'] = $name;
      $message['encodedName'] = $this->jwt->encode($name, $this->settings['jwt']['key']);
      $message['decodedName'] = $this->jwt->decode($message['encodedName'], $this->settings['jwt']['key'], $this->settings['jwt']['algorithms']);
      return json_encode(array('result' => $message));
    }

  }

?>
