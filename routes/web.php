<?php
return [
  'GET' => [
    '/' => ['HomeController', 'index'],
    '/login' => ['AuthController', 'index'],
    '/register' => ['RegisterController', 'index'],
    "/dashboard" => ['HomeController', 'index'],
    "/logout" => ['AuthController', 'logout'],
  ],

  'POST' => [
    '/books/store' => ['BookController', 'store'],
    '/register' => ['RegisterController', 'store'],
    '/login' => ['AuthController', 'login'],
  ]
];
