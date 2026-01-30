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
    $repo = new BookRepository();
    $books = $repo->all();
    require __DIR__ . '/../../resources/views/dashboard/home.php';
  }

  public function create()
  {
    $authors = (new AuthorRepository())->all();
    $categories = (new CategoryRepository())->all();
    require __DIR__ . '/../../resources/views/books/create.php';
  }

  public function store()
  {
    $title = $_POST['title'] ?? '';

    if (!$title) {
      $_SESSION['error'] = 'Judul wajib diisi';
      header('Location: /books/create');
      exit;
    }

    $repo = new BookRepository();
    $repo->create($title);

    header('Location: /books');
    exit;
  }
}
