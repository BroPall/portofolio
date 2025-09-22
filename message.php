<?php
session_start();
if (!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
    header("Location: login.php");
    exit;
}
include "db.php";
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Messages - Admin</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include "header.php"; ?>

  <main class="container">
    <div class="admin-top">
      <h2>Pesan Masuk</h2>
      <a href="logout.php" class="btn btn-outline">Logout</a>
    </div>

    <table class="table-messages" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Pesan</th>
          <th>Waktu</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $res = $conn->query("SELECT id, name, email, message, created_at FROM messages ORDER BY created_at DESC");
        $i = 1;
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td>".htmlspecialchars($row['name'])."</td>";
            echo "<td>".htmlspecialchars($row['email'])."</td>";
            echo "<td>".nl2br(htmlspecialchars($row['message']))."</td>";
            echo "<td>".$row['created_at']."</td>";
            echo "<td>
                    <form method='POST' action='delete_message.php' onsubmit=\"return confirm('Hapus pesan ini?');\">
                      <input type='hidden' name='id' value='".intval($row['id'])."'/>
                      <button type='submit' class='btn btn-danger'>Hapus</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        $res->free();
        $conn->close();
        ?>
      </tbody>
    </table>
  </main>

  <?php include "footer.php"; ?>
</body>
</html>
