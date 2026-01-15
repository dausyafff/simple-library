<?php

class UserRepository
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect();
  }

  public function findByEmail($email)
  {
    $stmt = $this->db->prepare(
      "SELECT * FROM users WHERE email = :email LIMIT 1"
    );
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function create($name, $email, $password)
  {
    $stmt = $this->db->prepare(
      "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
    );
    return $stmt->execute([$name, $email, $password]);
  }
}
