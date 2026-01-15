<?php
class RegisterController
{
  public function index()
  {
    $name = "Register Page";
    require __DIR__ . '/../../resources/views/auth/register.php';
  }

  public function register()
  {
    // Handle registration logic here
  }
}
