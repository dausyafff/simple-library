<?php

class AuthMiddleware
{
  public static function check()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: /login");
      exit;
    }
  }

  public static function guest()
  {
    if (isset($_SESSION['user'])) {
      header("Location: /dashboard");
      exit;
    }
  }
  // admin
  public static function admin()
  {
    if (
      !isset($_SESSION['user']) ||
      $_SESSION["user"]["role"] !== "admin"
    ) {
      http_response_code(403);
      echo "Akses ditolak";
      exit;
    }
  }
}
