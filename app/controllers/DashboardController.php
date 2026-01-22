<?php

class DashboardController
{
  public function index()
  {
    $books = (new BookService())->listHomepageBooks();
    require __DIR__ . '/../../resources/views/dashboard/index.php';
  }
}
