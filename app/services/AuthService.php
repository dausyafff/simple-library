<?php

class AuthService
{
  private $users;

  public function __construct()
  {
    $this->users = new UserRepository();
  }

  // REGISTER
  public function register($data)
  {
    if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
      throw new Exception("All fields required");
    }

    if ($this->users->findByEmail($data['email'])) {
      throw new Exception("Email already registered");
    }

    $hashed = password_hash($data['password'], PASSWORD_BCRYPT);

    $this->users->create(
      $data['name'],
      $data['email'],
      $hashed
    );
  }

  // LOGIN
  public function login($data)
  {
    if (empty($data['email']) || empty($data['password'])) {
      throw new Exception("Email & password required");
    }

    $user = $this->users->findByEmail($data['email']);

    if (!$user || !password_verify($data['password'], $user['password'])) {
      throw new Exception("Invalid credentials");
    }

    $_SESSION['user'] = [
      'id'    => $user['id'],
      'name'  => $user['name'],
      'email' => $user['email'],
    ];
  }

  public function logout()
  {
    session_destroy();
  }
}
