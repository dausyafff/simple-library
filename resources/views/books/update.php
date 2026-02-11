<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Update Buku</title>
</head>

<body>
  <h1>Edit Buku</h1>
  <form action="/books/update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($book['id']) ?>">
    <div>
      <label for="title">Judul:</label>
      <input type="text" id="title" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
    </div>
    <div>
      <label for="author">Penulis:</label>
      <select name="author_id" required>
        <?php foreach ($authors as $a): ?>
          <option value="<?= $a['id'] ?>" <?= $a['id'] == $book['author_id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($a['name']) ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>
    <div>
      <select name="category_id" required>
        <?php foreach ($categories as $c): ?>
          <option value="<?= $c['id'] ?>" <?= $c['id'] == $book['category_id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($c['name']) ?>
          </option>
        <?php endforeach ?>
      </select>

    </div>
    <div>
      <label for="year">Tahun Terbit:</label>
      <input type="number" id="year" name="year" value="<?= htmlspecialchars($book['year']) ?>" required>
    </div>
    <button type="submit">Simpan Perubahan</button>
</body>

</html>