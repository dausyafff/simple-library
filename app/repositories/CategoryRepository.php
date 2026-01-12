<?php

class CategoryRepository
{
  public function all()
  {
    $db = Database::connect();
    return $db->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
  }
}