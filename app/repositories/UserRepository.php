<?php

class UserRepository
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = Database::connect();
  }

  public function findByEmail($email)
  {
    $stmt = $this->pdo->prepare(
      "SELECT * FROM users WHERE email = :email LIMIT 1"
    );
    $stmt->execute(['email' => $email]);
    return $stmt->fetch();
  }

  public function create($username, $email, $password)
  {
    $stmt = $this->pdo->prepare(
      "INSERT INTO users (username, email, password)
             VALUES (:username, :email, :password)"
    );

    return $stmt->execute([
      'username' => $username,
      'email' => $email,
      'password' => $password,
    ]);
  }
}
