<?php
class AuthController
{
  public function index()
  {
    require __DIR__ . '/../../resources/views/auth/login.php';
    $name = "Login Page";
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
