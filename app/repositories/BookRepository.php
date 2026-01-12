<?php

class BookRepository
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect();
  }

  public function getAll()
  {
    return $this->db->query("
            SELECT b.*, a.name AS author, c.name AS category
            FROM books b
            JOIN authors a ON a.id = b.author_id
            JOIN categories c ON c.id = b.category_id
        ")->fetchAll();
  }

  public function create($title, $author, $category)
  {
    $stmt = $this->db->prepare(
      "INSERT INTO books (title, author_id, category_id) VALUES (?, ?, ?)"
    );
    $stmt->execute([$title, $author, $category]);
  }
}