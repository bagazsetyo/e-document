<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use Kuliah\ManagementDocument\App\Router;
use Kuliah\ManagementDocument\Controller\HomeController;
use Kuliah\ManagementDocument\Controller\UserController;
use Kuliah\ManagementDocument\Middleware\AuthMiddleware;

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/about', HomeController::class, 'about', []);

Router::add('GET', '/user', UserController::class, 'index', []);
Router::add('GET', '/user/detail/{email}', UserController::class, 'detail', []);
Router::add('GET', '/user/edit/{email}', UserController::class, 'edit', []);
Router::add('POST', '/user/edit/{email}', UserController::class, 'update', []);
Router::add('POST', '/user/delete/{email}', UserController::class, 'delete', []);
Router::add('GET', '/user/create', UserController::class, 'create', []);
Router::add('POST', '/user/create', UserController::class, 'store', []);
Router::add('GET', '/user/{email}', UserController::class, 'show', []);

Router::run();