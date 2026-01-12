<?php
class AuthorRepository
{
  public function all()
  {
    $db = Database::connect();
    return $db->query("SELECT * FROM authors")->fetchAll(PDO::FETCH_ASSOC);
  }
}