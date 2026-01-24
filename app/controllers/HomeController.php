<?php
require_once __DIR__ . '/../services/BookService.php';

class HomeController
{
  public function index()
  {
    $name = "Home";
    $books = (new BookService())->listHomepageBooks();
    require __DIR__ . '/../../resources/index.php';
  }
}
