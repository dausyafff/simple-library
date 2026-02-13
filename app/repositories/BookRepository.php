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
    WHERE id = ? "
    );

    $stmt->execute([$title, $author_id, $category_id, $year, $id]);
  }
  public function delete($id)
  {
    $stmt = $this->db->prepare("DELETE FROM books WHERE id = ?");
    $stmt->execute([$id]);
  }
  public function paginate($limit, $offset, $search = null)
  {
    $sql = "
    SELECT 
      books.id,
      books.title,
      authors.name AS author,
      categories.name AS category,
      books.year
    FROM books
    LEFT JOIN authors ON books.author_id = authors.id
    LEFT JOIN categories ON books.category_id = categories.id
  ";

    if ($search) {
      $sql .= " WHERE books.title LIKE :search ";
    }

    $sql .= " ORDER BY books.id DESC LIMIT :limit OFFSET :offset";

    $stmt = $this->db->prepare($sql);

    if ($search) {
      $stmt->bindValue(':search', "%$search%");
    }

    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function countAll($search = null)
  {
    $sql = "SELECT COUNT(*) as total FROM books";

    if ($search) {
      $sql .= " WHERE title LIKE :search";
    }

    $stmt = $this->db->prepare($sql);

    if ($search) {
      $stmt->bindValue(':search', "%$search%");
    }

    $stmt->execute();
    return $stmt->fetch()['total'];
  }
}
