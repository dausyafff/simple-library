<?php

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
}