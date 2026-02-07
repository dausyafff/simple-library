<?php

class BookRepository
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect();
  }

  public function all()
  {
    $sql = "
    SELECT 
      books.id,
      books.title,
      authors.name AS author,
      categories.name AS category,
      books.created_at
    FROM books
    LEFT JOIN authors ON books.author_id = authors.id
    LEFT JOIN categories ON books.category_id = categories.id
  ";

    return $this->db->query($sql)->fetchAll();
  }

  public function create($title, $author_id, $category_id, $year)
  {
    $stmt = $this->db->prepare("
    INSERT INTO books (title, author_id, category_id, year)
    VALUES (?, ?, ?, ?)
  ");

    $stmt->execute([$title, $author_id, $category_id, $year]);
  }
}
