<h2>Dashboard</h2>

<p>Selamat datang, <strong><?= htmlspecialchars($user['username']) ?></strong></p>
<p>Email: <?= htmlspecialchars($user['email']) ?></p>

<hr>

<form method="POST" action="/logout">
  <button type="submit">Logout</button>
</form>