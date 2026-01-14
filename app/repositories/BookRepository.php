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

  public function getLatestBooks()
  {
    $sql = "
            SELECT 
                books.title,
                authors.name AS author_name,
                categories.name AS category_name
            FROM books
            LEFT JOIN authors ON books.author_id = authors.id
            LEFT JOIN categories ON books.category_id = categories.id
            ORDER BY books.created_at DESC
        ";

    return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }
}
