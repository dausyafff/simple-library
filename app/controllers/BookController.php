<?php
require_once __DIR__ . '/../services/BookService.php';
require_once __DIR__ . '/../repositories/BookRepository.php';
require_once __DIR__ . '/../repositories/CategoryRepository.php';
require_once __DIR__ . '/../repositories/AuthorRepository.php';
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
    require __DIR__ . '/../../resources/views/books/index.php';
  }

  public function create()
  {
    $authors = (new AuthorRepository())->all();
    $categories = (new CategoryRepository())->all();
    require __DIR__ . '/../../resources/views/books/create.php';
  }

  public function store()
  {
    try {
      $this->service->createBook($_POST);
      Flash::set('success', 'Buku berhasil ditambahkan');
      header('Location: /books');
      exit;
    } catch (Exception $e) {
      Flash::set('error', $e->getMessage());
      header('Location: /books/create');
      exit;
    }
  }
}
