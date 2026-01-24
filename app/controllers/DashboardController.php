<?php

require_once __DIR__ . '/../services/BookService.php';
require_once __DIR__ . '/../helpers/auth.php';

class DashboardController
{
  public function index()
  {
    auth();
    $user = $_SESSION['user'];
    $books = (new BookService())->listHomepageBooks();
    $name = "Dashboard";
    require __DIR__ . '/../../resources/views/dashboard/index.php';
  }
}
