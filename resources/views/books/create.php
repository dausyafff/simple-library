<!DOCTYPE html>
<html>

<head>
  <title>Tambah Buku</title>
</head>

<body>


  <h2>➕ Tambah Buku</h2>

  <form action="/books/store" method="POST">
    <label>Judul</label><br>
    <input type="text" name="title" required><br><br>

    <select name="author_id" required>
      <?php foreach ($authors as $a): ?>
        <option value="<?= $a['id'] ?>">
          <?= htmlspecialchars($a['name']) ?>
        </option>
      <?php endforeach ?>
    </select>
    <br>
    <br>
    <select name="category_id" required>
      <?php foreach ($categories as $c): ?>
        <option value="<?= $c['id'] ?>">
          <?= htmlspecialchars($c['name']) ?>
        </option>
      <?php endforeach ?>
    </select>
    <br>
    <br>
    <label>Tahun</label>
    <input type="number" name="year" required><br><br>

    <button type="submit">Simpan</button>
    <a href="/books">Batal</a>
  </form>

</body>

</html>