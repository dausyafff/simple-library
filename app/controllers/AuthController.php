<?php
class AuthController
{
  public function index()
  {
    $name = "Login Page";
    require __DIR__ . '/../../resources/views/auth/login.php';
  }

  public function login()
  {
    // Handle login logic here
    $username = $_POST['username'];
    $password = $_POST['password'];

    var_dump($username);
    var_dump($password);
  }
}