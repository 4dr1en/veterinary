<?php
// Application entry point

namespace App;

use Utils\{Router, Parameters, ContainerManager};

require_once '../vendor/autoload.php';

Parameters::load();

// Load the routes
require_once '../routes.php';

// call the controller for the current uri
$container = ContainerManager::getContainer();
$router = $container->get(Router::class);
$router->callCurPathController();
