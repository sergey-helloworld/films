<?php

/**
 *
 */
abstract class AbstractController
{

  public function handleRoute($args)
  {
    //$this->handleRequest($args);
    $this->handleAction($args);
  }
  protected function handleAction($args)
  {
    $action = $args[0];
    array_splice($args, 0, 1);
    $this->{$action}($args);
  }
  protected function renderTemplate($template, $args = null)
  {
    $selfController = $this->getControllerFileName();
    include($template);

  }
  abstract public function getControllerFileName();
  protected function isPost()
  {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }
  protected function isGet()
  {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
  }
}


 ?>
