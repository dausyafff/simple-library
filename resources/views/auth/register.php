<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $name; ?></title>
</head>

<body>
  <h2>Register</h2>
  <form method="POST" action="/register">
    <input type="text" name="username" placeholder="Username" required>
    <br>
    <input type="email" name="email" placeholder="Email" required>
    <br>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</body>

</html>