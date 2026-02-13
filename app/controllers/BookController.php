<?php
require_once __DIR__ . '/../helpers/flash.php';
require_once __DIR__ . '/../services/BookService.php';
require_once __DIR__ . '/../repositories/BookRepository.php';
require_once __DIR__ . '/../repositories/AuthorRepository.php';
require_once __DIR__ . '/../repositories/CategoryRepository.php';
class BookController
{
  private $service;

  public function __construct()
  {
    $this->service = new BookService();
  }

  public function index()
  {
    $page = $_GET['page'] ?? 1;
    $search = $_GET['search'] ?? '';

    $results = $this->service->getPaginatedBooks($page, $search);

    $books = $results['books']; // ✅ pakai hasil pagination
    $totalPages = ceil($results['total'] / $results["limit"]);

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
  public function edit()
  {
    $authors = (new AuthorRepository())->all();
    $categories = (new CategoryRepository())->all();
    $id = $_GET['id'] ?? null;
    if (!$id) {
      Flash::set('error', 'ID buku tidak ditemukan');
      header('Location: /books');
      exit;
    }

    $book = $this->service->getBookById($id);
    if (!$book) {
      Flash::set('error', 'Buku tidak ditemukan');
      header('Location: /books');
      exit;
    }

    require __DIR__ . '/../../resources/views/books/update.php';
  }

  public function update()
  {
    try {
      $this->service->updateBook($_POST["id"] ?? null, $_POST);
      Flash::set('success', 'Buku berhasil diperbarui');
      header('Location: /books');
      exit;
    } catch (Exception $e) {
      Flash::set('error', $e->getMessage());
      header('Location: /books/edit?id=' . $_POST['id']);
      exit;
    }
  }
  public function delete()
  {
    try {
      $id = $_POST['id'] ?? null; // ✅ ini yang benar

      if (!$id) {
        throw new Exception('ID buku tidak ditemukan');
      }

      $this->service->deleteBook($id);

      Flash::set('success', 'Buku berhasil dihapus');
      header('Location: /books');
      exit;
    } catch (Exception $e) {
      Flash::set('error', $e->getMessage());
      header('Location: /books');
      exit;
    }
  }
}
