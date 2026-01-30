<?php
require_once __DIR__ . '/../services/AuthService.php';

class RegisterController
{
  public function index()
  {
    $name = "Register";
    require_once __DIR__ . "/../../resources/views/auth/register.php";
  }

  public function store()
  {
    try {
      $auth = new AuthService();
      $auth->register($_POST);

      $_SESSION['success'] = 'Registrasi berhasil, silakan login';
      Flash::set("success", "Registrasi berhasil, silakan login");
      header('Location: /login');
      exit;
    } catch (Exception $e) {
      Flash::set("error", $e->getMessage());
      header('Location: /register');
      exit;
    }
  }
}
