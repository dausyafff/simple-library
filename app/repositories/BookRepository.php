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
    return $this->db->query("SELECT * FROM books")->fetchAll();
  }

  public function create($title)
  {
    $stmt = $this->db->prepare("INSERT INTO books (title) VALUES (?)");
    $stmt->execute([$title]);
  }
}
