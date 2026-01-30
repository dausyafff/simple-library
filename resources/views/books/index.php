<h2>Daftar Buku</h2>

<?php if ($_SESSION['user']['role'] === 'admin'): ?>
  <a href="/books/create">Tambah Buku</a>
<?php endif; ?>

<ul>
  <?php foreach ($books as $book): ?>
    <li><?= htmlspecialchars($book['title']) ?></li>
  <?php endforeach; ?>
</ul>