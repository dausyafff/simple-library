<!DOCTYPE html>
<html>

<head>
  <title> <?= $name; ?></title>
</head>

<body>
  <a href="/register">Belum Punya Akun ?</a>
  <h2>Login</h2>

  <?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red;">
      <?= $_SESSION['error'];
      unset($_SESSION['error']); ?>
    </p>
  <?php endif; ?>

  <?php if ($msg = Flash::get('error')): ?>
    <p style="color:red"><?= htmlspecialchars($msg) ?></p>
  <?php endif; ?>

  <?php if ($msg = Flash::get('success')): ?>
    <p style="color:green"><?= htmlspecialchars($msg) ?></p>
  <?php endif; ?>


  <form method="POST" action="/login">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>

</body>

</html>