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

    <label>Penulis</label><br>
    <input type="text" name="author" required><br><br>

    <label>Tahun</label><br>
    <input type="number" name="year" required><br><br>

    <button type="submit">Simpan</button>
    <a href="/books">Batal</a>
  </form>

</body>

</html>