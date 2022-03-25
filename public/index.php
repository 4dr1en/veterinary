<?php

use Utils\{Router, Parameters};
use App\Controllers\{HomeController, ListController};

require_once '../vendor/autoload.php';

Parameters::load();

$router = new Router();
$router
	->setRoute('home', '/', HomeController::class)
	->setRoute('list', '/list', ListController::class);
$router->callCurPathController();
