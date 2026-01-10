<?php

require_once __DIR__ . '/../config/database.php';

$routes = require __DIR__ . '/../routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$action = $routes[$uri] ?? null;

if (!$action) {
  die("404 Not Found");
}

require_once __DIR__ . '/../app/Controllers/' . $action[0] . '.php';

$controller = new $action[0];
call_user_func([$controller, $action[1]]);