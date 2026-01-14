<?php

// 1. Panggil file konfigurasi database
require_once __DIR__ . '/../app/config/database.php';

$route = require_once __DIR__ . '/../routes/web.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// hasil "/perpustakaan/public/"

$url = rtrim($url, '/') ?: "/";
// hasil "/perpustakaan/public"

if (!isset($route[$url])) {
  http_response_code(404);
  echo "Halaman tidak ditemukan.";
  exit;
}

$tes = [$controller, $method] = $route[$url];

// load controller
require_once __DIR__ . '/../app/controllers/' . $controller . '.php';

$controllerInstance = new $controller();
$controllerInstance->$method();
