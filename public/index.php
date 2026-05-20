<?php
require_once '../app/core/Router.php';

use App\Core\Router;

$router = new Router();

//Register routes
$router->add('GET', '/students', 'StudentController', 'index');
$router->add('GET', '/students/create', 'StudentController', 'create');
$router->add('GET', '/students/{id}', 'StudentController', 'show');


// Daftar Channel
$router->add('GET', '/channels', 'ChannelController', 'index');
$router->add('GET', '/channels/detail', 'ChannelController', 'detail');


$router->add('GET', '/search', 'SearchController', 'index');


// Daftar Informasi
$router->add('GET', '/informations', 'InformationController', 'index');

$router->add('GET', '/home', 'HomeController', 'index');

$router->run();
?>

 <!-- home page -->

