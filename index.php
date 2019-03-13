<?php

include 'src/Router.php';
include 'controllers/MainController.php';

$r = new Router();
$r->addRoute(new MainController());

$r->redirect($_SERVER['PATH_INFO']);

 ?>
