<?php
return [
  'GET' => [
    '/' => [
      'controller' => 'HomeController',
      'method' => 'index'
    ],

    '/login' => [
      'controller' => 'AuthController',
      'method' => 'index',
      'middleware' => 'guest'
    ],

    '/register' => [
      'controller' => 'RegisterController',
      'method' => 'index',
      'middleware' => 'guest'
    ],

    '/dashboard' => [
      'controller' => 'DashboardController',
      'method' => 'index',
      'middleware' => 'auth'
    ],

    '/books' => [
      'controller' => 'BookController',
      'method' => 'index',
      'middleware' => 'auth'
    ],

    '/books/create' => [
      'controller' => 'BookController',
      'method' => 'create',
      'middleware' => 'admin'
    ],
    '/books/edit' => [
      'controller' => 'BookController',
      'method' => 'edit',
      'middleware' => 'admin'
    ],
  ],

  'POST' => [
    '/login' => [
      'controller' => 'AuthController',
      'method' => 'login',
      'middleware' => 'guest'
    ],

    '/register' => [
      'controller' => 'RegisterController',
      'method' => 'store',
      'middleware' => 'guest'
    ],

    '/books/store' => [
      'controller' => 'BookController',
      'method' => 'store',
      'middleware' => 'admin'
    ],
    '/books/update' => [
      'controller' => 'BookController',
      'method' => 'update',
      'middleware' => 'admin'
    ],
    '/books/delete' => [
      'controller' => 'BookController',
      'method' => 'delete',
      'middleware' => 'admin'
    ],
    "/logout" => [
      'controller' => 'AuthController',
      'method' => 'logout',
      'middleware' => 'auth'
    ],
  ]
];
