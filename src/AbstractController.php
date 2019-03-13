<?php

/**
 *
 */
abstract class AbstractController
{
  protected function handleRequest($args)
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->handlePost($_POST, $args);
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
      $this->handleGet($_GET, $args);
    }
  }
  protected function handlePost($data, $args) {}
  protected function handleGet($data, $args) {}
  abstract public function handleRoute($args);
}


 ?>
