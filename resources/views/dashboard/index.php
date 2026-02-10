<h2>Dashboard</h2>

<p>Selamat datang, <?= htmlspecialchars($user["role"]); ?>
  <strong><?= htmlspecialchars(strtoupper($user['username'])) ?></strong>
</p>
<p>Email: <?= htmlspecialchars($user['email']) ?></p>

<a href="/books">Lihat Buku</a>
<hr>

<form method="POST" action="/logout">
  <button type="submit">Logout</button>
</form>