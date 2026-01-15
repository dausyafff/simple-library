<?php
require_once __DIR__ . '/../services/BookService.php';

class HomeController
{
  public function index()
  {
    $books = (new BookService())->listHomepageBooks();
    require __DIR__ . '/../../resources/views/dashboard/home.php';
  }
}
