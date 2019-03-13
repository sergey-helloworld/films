<?php


include 'src/AbstractController.php';
include 'src/ORM.php';
include 'models/Person.php';
include 'views/MainView.php';
include 'src/MysqlDbProvider.php';
/**
 *
 */
class MainController extends AbstractController
{

  protected function handlePost($data, $args)
  {

  }

  public function handleRoute($args)
  {
    $db = MysqlDbProvider::getConnection('localhost', 'mvc', 'root', '1234');
    $orm = new ORM($db, new Person());
    return new MainView($orm->findAll());
  }

}


 ?>
