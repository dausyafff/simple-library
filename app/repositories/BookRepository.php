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
      books.created_at,
      books.year
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

  public function findById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
  }

  public function update($id, $title, $author_id, $category_id, $year)
  {
    $stmt = $this->db->prepare(
      "
    UPDATE books
    SET title = ?, author_id = ?, category_id = ?, year = ?
    WHERE id = ?
    }  "
    );

    $stmt->execute([$title, $author_id, $category_id, $year, $id]);
  }
}
