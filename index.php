<?php

include 'src/Router.php';
include 'src/AbstractController.php';
include 'src/MysqlDbProvider.php';
include 'controllers/FilmsController.php';
include 'models/FilmsParser.php';

$r = new Router();
$r->addRoute(new FilmsController());

$r->redirect($_SERVER['PATH_INFO'] ?? '/films/list');

 ?>
