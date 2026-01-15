<?php

class BookController
{
  private $service;

  public function __construct()
  {
    $this->service = new BookService();
  }

  public function index()
  {
    $books = $this->service->listBooks();
    require __DIR__ . '/../../resources/views/dashboard/home.php';
  }

  public function create()
  {
    $authors = (new AuthorRepository())->all();
    $categories = (new CategoryRepository())->all();
    require __DIR__ . "../create.php";
  }

  public function store()
  {
    $this->service->addBook($_POST);
    header("Location: /books");
  }
}
