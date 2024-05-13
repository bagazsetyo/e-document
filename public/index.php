<?php 
 
// error_reporting(0);

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    dd($errno, $errstr, $errfile, $errline);
    $debug = config('debug');
    if(!$debug) {
        http_response_code(500);
        header('Location: /500.html');
        exit;
    }
});

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
use Kuliah\ManagementDocument\Controller\RoleController;
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
Router::add('GET', '/user/export', UserController::class, 'export', [AuthMiddleware::class]);
Router::add('GET', '/user/{email}', UserController::class, 'show', [AuthMiddleware::class]);

// Permission
Router::add('GET', '/permission', PermissionController::class, 'index', [AuthMiddleware::class]);

// Role 
Router::add('GET', '/role', RoleController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/role/create', RoleController::class, 'create', [AuthMiddleware::class]);
Router::add('POST', '/role/create', RoleController::class, 'store', [AuthMiddleware::class]);
Router::add('GET', '/role/edit/{id}', RoleController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/role/edit/{id}', RoleController::class, 'update', [AuthMiddleware::class]);
Router::add('POST', '/role/delete/{id}', RoleController::class, 'delete', [AuthMiddleware::class]);

// Log
Router::add('GET', '/log', LogController::class, 'index', [AuthMiddleware::class]);

// Setting
Router::add('GET', '/settings', SettingController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/settings/create', SettingController::class, 'create', [AuthMiddleware::class]);
Router::add('POST', '/settings/create', SettingController::class, 'store', [AuthMiddleware::class]);
Router::add('GET', '/settings/edit/{id}', SettingController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/settings/edit/{id}', SettingController::class, 'update', [AuthMiddleware::class]);
Router::add('POST', '/settings/delete/{id}', SettingController::class, 'delete', [AuthMiddleware::class]);

// Master 
// Kategori 
Router::add('GET', '/master/kategori', KategoriDokumenController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/master/kategori/create', KategoriDokumenController::class, 'create', [AuthMiddleware::class]);
Router::add('POST', '/master/kategori/create', KategoriDokumenController::class, 'store', [AuthMiddleware::class]);
Router::add('GET', '/master/kategori/edit/{id}', KategoriDokumenController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/master/kategori/edit/{id}', KategoriDokumenController::class, 'update', [AuthMiddleware::class]);
Router::add('POST', '/master/kategori/delete/{id}', KategoriDokumenController::class, 'delete', [AuthMiddleware::class]);
Router::add('GET', '/master/kategori/export', KategoriDokumenController::class, 'export', [AuthMiddleware::class]);
Router::add('GET', '/master/kategori/{id}', KategoriDokumenController::class, 'detail', [AuthMiddleware::class]);

// Jenis Pengguna
Router::add('GET', '/master/jenis-pengguna', JenisPenggunaController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/master/jenis-pengguna/create', JenisPenggunaController::class, 'create', [AuthMiddleware::class]);
Router::add('POST', '/master/jenis-pengguna/create', JenisPenggunaController::class, 'store', [AuthMiddleware::class]);
Router::add('GET', '/master/jenis-pengguna/edit/{id}', JenisPenggunaController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/master/jenis-pengguna/edit/{id}', JenisPenggunaController::class, 'update', [AuthMiddleware::class]);
Router::add('POST', '/master/jenis-pengguna/delete/{id}', JenisPenggunaController::class, 'delete', [AuthMiddleware::class]);
Router::add('GET', '/master/jenis-pengguna/export', JenisPenggunaController::class, 'export', [AuthMiddleware::class]);
Router::add('GET', '/master/jenis-pengguna/{id}', JenisPenggunaController::class, 'detail', [AuthMiddleware::class]);

// Pengguna
Router::add('GET', '/master/pengguna', PenggunaController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/master/pengguna/create', PenggunaController::class, 'create', [AuthMiddleware::class]);
Router::add('POST', '/master/pengguna/create', PenggunaController::class, 'store', [AuthMiddleware::class]);
Router::add('GET', '/master/pengguna/edit/{id}', PenggunaController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/master/pengguna/edit/{id}', PenggunaController::class, 'update', [AuthMiddleware::class]);
Router::add('POST', '/master/pengguna/delete/{id}', PenggunaController::class, 'delete', [AuthMiddleware::class]);
Router::add('GET', '/master/pengguna/export', PenggunaController::class, 'export', [AuthMiddleware::class]);
Router::add('GET', '/master/pengguna/{id}', PenggunaController::class, 'detail', [AuthMiddleware::class]);

// Dokumen
Router::add('GET', '/master/dokumen', DokumenController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/master/dokumen/create', DokumenController::class, 'create', [AuthMiddleware::class]);
Router::add('POST', '/master/dokumen/create', DokumenController::class, 'store', [AuthMiddleware::class]);
Router::add('GET', '/master/dokumen/edit/{id}', DokumenController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/master/dokumen/edit/{id}', DokumenController::class, 'update', [AuthMiddleware::class]);
Router::add('POST', '/master/dokumen/delete/{id}', DokumenController::class, 'delete', [AuthMiddleware::class]);
Router::add('GET', '/master/dokumen/export', DokumenController::class, 'export', [AuthMiddleware::class]);
Router::add('GET', '/master/dokumen/{id}', DokumenController::class, 'detail', [AuthMiddleware::class]);

// Dokumen File 
Router::add('GET', '/master/dokumen-file', DokumenFileController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/master/dokumen-file/create', DokumenFileController::class, 'create', [AuthMiddleware::class]);
Router::add('POST', '/master/dokumen-file/create', DokumenFileController::class, 'store', [AuthMiddleware::class]);
Router::add('GET', '/master/dokumen-file/edit/{id}', DokumenFileController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/master/dokumen-file/edit/{id}', DokumenFileController::class, 'update', [AuthMiddleware::class]);
Router::add('POST', '/master/dokumen-file/delete/{id}', DokumenFileController::class, 'delete', [AuthMiddleware::class]);
Router::add('GET', '/master/dokumen-file/export', DokumenFileController::class, 'export', [AuthMiddleware::class]);
Router::add('GET', '/master/dokumen-file/{id}', DokumenFileController::class, 'detail', [AuthMiddleware::class]);

Router::run();