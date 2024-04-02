<?php 

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Kuliah\ManagementDocument\App\Router;
use Kuliah\ManagementDocument\Controller\AuthController;
use Kuliah\ManagementDocument\Controller\DokumenController;
use Kuliah\ManagementDocument\Controller\DokumenFileController;
use Kuliah\ManagementDocument\Controller\HomeController;
use Kuliah\ManagementDocument\Controller\JenisPenggunaController;
use Kuliah\ManagementDocument\Controller\KategoriDokumenController;
use Kuliah\ManagementDocument\Controller\LogController;
use Kuliah\ManagementDocument\Controller\PenggunaController;
use Kuliah\ManagementDocument\Controller\PermissionController;
use Kuliah\ManagementDocument\Controller\SettingController;
use Kuliah\ManagementDocument\Controller\UserController;
use Kuliah\ManagementDocument\Middleware\AuthMiddleware;
use Kuliah\ManagementDocument\Middleware\GuestMiddleware;

Router::add('GET', '/', AuthController::class, 'index', [GuestMiddleware::class]);
Router::add('POST', '/', AuthController::class, 'login', [GuestMiddleware::class]);

Router::add('GET', '/dashboard', HomeController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/logout', AuthController::class, 'logout', [AuthMiddleware::class]);

Router::add('GET', '/user', UserController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/user/detail/{email}', UserController::class, 'detail', [AuthMiddleware::class]);
Router::add('GET', '/user/edit/{email}', UserController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/user/edit/{email}', UserController::class, 'update', [AuthMiddleware::class]);
Router::add('POST', '/user/delete/{email}', UserController::class, 'delete', [AuthMiddleware::class]);
Router::add('GET', '/user/create', UserController::class, 'create', [AuthMiddleware::class]);
Router::add('POST', '/user/create', UserController::class, 'store', [AuthMiddleware::class]);
Router::add('GET', '/user/{email}', UserController::class, 'show', [AuthMiddleware::class]);

// Permission
Router::add('GET', '/permission', PermissionController::class, 'index', [AuthMiddleware::class]);

// Log
Router::add('GET', '/log', LogController::class, 'index', [AuthMiddleware::class]);

// Setting
Router::add('GET', '/setting', SettingController::class, 'index', [AuthMiddleware::class]);

// Master 
// Kategori 
Router::add('GET', '/master/kategori', KategoriDokumenController::class, 'index', [AuthMiddleware::class]);

// Jenis Pengguna
Router::add('GET', '/master/jenis-pengguna', JenisPenggunaController::class, 'index', [AuthMiddleware::class]);

// Pengguna
Router::add('GET', '/master/pengguna', PenggunaController::class, 'index', [AuthMiddleware::class]);

// Dokumen
Router::add('GET', '/master/dokumen', DokumenController::class, 'index', [AuthMiddleware::class]);
Router::add('POST', '/master/dokumen/edit', DokumenController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/master/dokumen/update', DokumenController::class, 'update', [AuthMiddleware::class]);

// Dokumen File 
Router::add('GET', '/master/dokumen-file', DokumenFileController::class, 'index', [AuthMiddleware::class]);

Router::run();