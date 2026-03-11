<?php
require_once '../app/core/Router.php';

use App\Core\Router;

$router = new Router();

//Register routes
$router->add('GET', '/students', 'StudentController', 'index');
$router->add('GET', '/students/create', 'StudentController', 'create');
$router->add('GET', '/students/{id}', 'StudentController', 'show');

$router->run();
?>