<?php
session_start();

require_once __DIR__ . '/../app/middleware/AuthMiddleware.php';
require_once __DIR__ . '/../app/config/Database.php';

$routes = require __DIR__ . '/../routes/web.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';

// CEK METHOD
if (!isset($routes[$method][$uri])) {
  http_response_code(404);
  echo "404 Not Found";
  exit;
}

$route = $routes[$method][$uri];

// Middleware
if (isset($route['middleware'])) {
  switch ($route['middleware']) {
    case 'auth':
      AuthMiddleware::check();
      break;
    case 'guest':
      AuthMiddleware::guest();
      break;
    case 'admin':
      AuthMiddleware::admin();
      break;
  }
}

// Controller
require_once __DIR__ . '/../app/controllers/' . $route['controller'] . '.php';

$controller = new $route['controller'];
$methodName = $route['method'];
$controller->$methodName();
