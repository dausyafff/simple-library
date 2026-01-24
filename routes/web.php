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

    '/logout' => [
      'controller' => 'AuthController',
      'method' => 'logout',
      'middleware' => 'auth'
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
  ]
];
