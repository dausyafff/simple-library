<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $name; ?></title>
</head>

<body>
  <p>
    <a href="/login">Login</a>
  </p>
  <h1>Books</h1>
  <ul>
    <?php if (empty($books)): ?>
    <li>Belum ada buku.</li>
    <?php else: ?>
    <?php foreach ($books as $book): ?>
    <li>
      <strong><?= htmlspecialchars($book['title']) ?></strong>
      oleh <?= htmlspecialchars($book['author_name'] ?? '–') ?>
      [<?= htmlspecialchars($book['category_name'] ?? '–') ?>]
    </li>
    <?php endforeach; ?>
    <?php endif; ?>
  </ul>
</body>

</html>