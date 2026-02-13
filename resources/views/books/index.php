<!DOCTYPE html>
<html>

<head>
  <title>Data Buku</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      border: 1px solid #ccc;
      padding: 8px;
    }

    th {
      background: #f5f5f5;
    }

    .btn {
      padding: 6px 10px;
      text-decoration: none;
      border-radius: 4px;
      font-size: 14px;
    }

    .btn-add {
      background: #4CAF50;
      color: white;
    }
  </style>
</head>

<body>
  <a href="/dashboard">Kembali ke Dashboard</a><br>
  <form method="GET" action="/books">
    <input type="text" name="search" placeholder="Cari judul..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
  </form>

  <h2>📚 Data Buku, <?= $tes ?? '000' ?></h2>

  <?php if ($_SESSION['user']['role'] === 'admin'): ?>
    <a href="/books/create" class="btn btn-add">+ Tambah Buku</a>
  <?php endif; ?>

  <br><br>
  <p>Ini tabel admin</p>
  <table>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Tahun</th>

      <?php if ($_SESSION['user']['role'] === 'admin'): ?>
        <th>Aksi</th>
      <?php endif; ?>
    </tr>

    <?php foreach ($books as $index => $book): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= htmlspecialchars($book['title']) ?></td>
        <td><?= htmlspecialchars($book['author'] ?? '-') ?></td>
        <td><?= htmlspecialchars($book['year'] ?? '-') ?></td>

        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
          <td>
            <a href="/books/edit?id=<?= $book['id'] ?>" class="btn">Edit</a>

            <form action="/books/delete" method="POST" style="display:inline-block"
              onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
              <input type="hidden" name="id" value="<?= $book['id'] ?>">
              <button type="submit" class="btn">Hapus</button>
            </form>
          </td>
        <?php endif; ?>
      </tr>
    <?php endforeach; ?>
  </table>

  <div>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <a href="/books?page=<?= $i ?>&search=<?= $_GET['search'] ?? '' ?>">
        <?= $i ?>
      </a>
    <?php endfor; ?>
  </div>

</body>

</html>