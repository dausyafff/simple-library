<?php
require_once __DIR__ . '/../repositories/BookRepository.php';
class BookService
{
  private $repo;

  public function __construct()
  {
    $this->repo = new BookRepository();
  }

  public function listBooks()
  {
    return $this->repo->getAll();
  }

  public function addBook($data)
  {
    if (empty($data['title'])) {
      throw new Exception("Title required");
    }

    $this->repo->create(
      $data['title'],
      $data['author_id'],
      $data['category_id']
    );
  }
  public function listHomepageBooks()
  {
    return $this->repo->all();
  }
  public function createBook($data)
  {
    $title = trim($data['title'] ?? '');
    $author = $data['author_id'] ?? null;
    $category = $data['category_id'] ?? null;

    if (!$title) {
      throw new Exception('Judul wajib');
    }

    $this->repo->create($title, $author, $category);
  }
}
