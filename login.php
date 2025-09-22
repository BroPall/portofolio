<?php
// login.php
session_start();
if (isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] === true) {
    header("Location: messages.php");
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">
  <main class="auth-card">
    <h2>Admin Login</h2>
    <form action="do_login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <div class="form-actions">
        <button class="btn" type="submit">Login</button>
      </div>
    </form>
    <p>Default: <strong>admin / admin123</strong> (ubah di do_login.php)</p>
  </main>
</body>
</html>
