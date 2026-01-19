<?php
session_start();

require_once __DIR__ . '/../app/config/database.php';

$routes = require __DIR__ . '/../routes/web.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// hapus base path
$basePath = '/perpustakaan/public';
$uri = str_replace($basePath, '', $uri);
$uri = rtrim($uri, '/') ?: '/';

if (!isset($routes[$method][$uri])) {
  http_response_code(404);
  echo "Halaman tidak ditemukan";
  exit;
}

[$controller, $action] = $routes[$method][$uri];

require_once __DIR__ . '/../app/controllers/' . $controller . '.php';

$controllerInstance = new $controller();
$controllerInstance->$action();
