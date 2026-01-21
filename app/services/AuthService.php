<?php

require_once __DIR__ . '/../repositories/UserRepository.php';

class AuthService
{
  private $userRepo;

  public function __construct()
  {
    $this->userRepo = new UserRepository();
  }

  public function register($data)
  {
    $username = trim($data['username'] ?? '');
    $email = trim($data['email'] ?? '');
    $password = $data['password'] ?? '';
    $confirm = $data['password_konfirmasi'] ?? '';

    if (!$username || !$email || !$password || !$confirm) {
      throw new Exception('Semua field wajib diisi');
    }

    if ($password !== $confirm) {
      throw new Exception('Password tidak cocok');
    }

    if (strlen($password) < 6) {
      throw new Exception('Password minimal 6 karakter');
    }

    if ($this->userRepo->findByEmail($email)) {
      throw new Exception('Email sudah terdaftar');
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $this->userRepo->create($username, $email, $hash);
  }
}
