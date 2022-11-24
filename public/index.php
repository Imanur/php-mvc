<?php

require_once __DIR__ . "/../vendor/autoload.php";

use ProgrammerPhp\PhpMvc\Config\Router;
use ProgrammerPhp\PhpMvc\Controller\HomeController;
use ProgrammerPhp\PhpMvc\Controller\ProductController;
use ProgrammerPhp\PhpMvc\Middleware\AuthMiddleware;

// if (isset($_SERVER['PATH_INFO'])) {
//     echo $_SERVER['PATH_INFO'];
// } else {
//     echo "Tidak ada PATH_INFO";
// }

//entry point
// $path = "/index";
// if (isset($_SERVER['PATH_INFO'])) {
//     $path = $_SERVER['PATH_INFO'];
// }

//arahkan ke path nya
// require __DIR__ . "/../app/View" . $path . ".php";
// require __DIR__ . "/../app/View/login.php";

// Router::add('GET', '/', 'HomeController', 'index');
// Router::add('GET', '/register', 'UserController', 'register');
// Router::add('GET', '/login', 'UserController', 'login');

Router::add('GET', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)', ProductController::class, 'categories');

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/hello', HomeController::class, 'hello', [AuthMiddleware::class]);
Router::add('GET', '/world', HomeController::class, 'world', [AuthMiddleware::class]);
Router::add('GET', '/about', HomeController::class, 'about');

Router::run();
