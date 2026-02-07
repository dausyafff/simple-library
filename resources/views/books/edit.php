<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Edit Buku</title>
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
      <input type="text" id="author" name="author" value="<?= htmlspecialchars($book['author']) ?>" required>
    </div>
    <div>
      <label for="year">Tahun Terbit:</label>
      <input type="number" id="year" name="year" value="<?= htmlspecialchars($book['year']) ?>" required>
    </div>
    <button type="submit">Simpan Perubahan</button>
</body>

</html>