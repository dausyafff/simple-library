<?php
require_once __DIR__ . '/app/controllers/BookController.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan</title>
</head>

<body>
  <h2>Books</h2>
  <a href="/books/create">Add</a>

  <ul>
    <?php foreach ($books as $b): ?>
      <li>
        <?= $b['title'] ?> - <?= $b['author'] ?> (<?= $b['category'] ?>)
      </li>
    <?php endforeach ?>
  </ul>
</body>

</html>