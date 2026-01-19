<?php
class RegisterController
{
  public function index()
  {
    $name = "Register Page";
    require __DIR__ . '/../../resources/views/auth/register.php';
  }

  public function store()
  {
    // if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //   die('Invalid request');
    // }

    var_dump($_POST);
    exit;
  }
}
