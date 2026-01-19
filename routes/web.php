<?php
return [
  'GET' => [
    '/' => ['HomeController', 'index'],
    '/login' => ['AuthController', 'index'],
    '/register' => ['RegisterController', 'index'],
    '/books' => ['BookController', 'index'],
    '/books/create' => ['BookController', 'create'],
  ],

  'POST' => [
    '/books/store' => ['BookController', 'store'],
    '/register' => ['RegisterController', 'store'],
    '/login' => ['AuthController', 'login'],
  ]
];
