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
    try {
      $auth = new AuthService();
      $auth->login($_POST);

      header('Location: /dashboard');
      exit;
    } catch (Exception $e) {
      $_SESSION['error'] = $e->getMessage();
      header('Location: /login');
      exit;
    }
  }
  public function logout()
  {
    session_destroy();
    header('Location: /login');
    exit;
  }
}
