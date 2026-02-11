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
    return $this->repo->all();
  }

  public function listHomepageBooks()
  {
    return $this->repo->all();
  }

  public function createBook($data)
  {
    $title = trim($data['title'] ?? '');
    $author_id = $data['author_id'] ?? null;
    $category_id = $data['category_id'] ?? null;
    $year = $data['year'] ?? null;

    // Validasi dasar (cara industri)
    if (!$title) {
      throw new Exception('Judul buku wajib diisi');
    }

    if (!$author_id) {
      throw new Exception('Author wajib dipilih');
    }

    if (!$category_id) {
      throw new Exception('Category wajib dipilih');
    }

    if ($year && !is_numeric($year)) {
      throw new Exception('Tahun harus angka');
    }

    // Kirim ke repository
    $this->repo->create($title, $author_id, $category_id, $year);
  }

  public function getBookById($id)
  {
    return $this->repo->findById($id);
  }

  public function updateBook($id, $data)
  {
    $title = trim($data['title'] ?? '');
    $author_id = $data['author_id'] ?? null;
    $category_id = $data['category_id'] ?? null;
    $year = $data['year'] ?? null;

    // Validasi dasar (cara industri)
    if (!$title) {
      throw new Exception('Judul buku wajib diisi');
    }

    if (!$author_id) {
      throw new Exception('Author wajib dipilih');
    }

    if (!$category_id) {
      throw new Exception('Category wajib dipilih');
    }

    if ($year && !is_numeric($year)) {
      throw new Exception('Tahun harus angka');
    }

    // Kirim ke repository
    $this->repo->update($id, $title, $author_id, $category_id, $year);
  }
}
