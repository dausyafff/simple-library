<?php if (!empty($_SESSION['error'])): ?>
  <p style="color:red;">
    <?= $_SESSION['error'];
    unset($_SESSION['error']); ?>
  </p>
<?php endif; ?>

<form method="POST" action="/register">
  <input name="username" placeholder="Username" required><br>
  <input name="email" type="email" placeholder="Email" required><br>
  <input name="password_konfirmasi" type="password" placeholder="Konfirmasi Password" required><br>
  <input name="password" type="password" placeholder="Password" required><br>
  <button type="submit">Register</button>
</form>