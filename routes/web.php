<?php

return [
  '/books' => ['BookController', 'index'],
  '/books/create' => ['BookController', 'create'],
  '/books/store' => ['BookController', 'store'],
  "/" => ['HomeController', 'index'],
  "/login" => ['AuthController', 'index'],
  "/register" => ['RegisterController', 'index']
];
