<?php
// save_message.php (fallback)
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $message = $conn->real_escape_string($_POST['message'] ?? '');

    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $ok = $stmt->execute();
    $stmt->close();
    $conn->close();

    if ($ok) {
        header("Location: index.php?sent=1");
        exit;
    } else {
        echo "Gagal menyimpan pesan.";
    }
}
?>
