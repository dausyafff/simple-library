<?php
function auth()
{
  if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit;
  }
}
