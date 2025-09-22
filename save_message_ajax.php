<?php
// save_message_ajax.php
include "db.php";

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status'=>'error','message'=>'Method not allowed']);
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    http_response_code(422);
    echo json_encode(['status'=>'error','message'=>'Semua field harus diisi']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['status'=>'error','message'=>'Gagal memproses query']);
    exit;
}
$stmt->bind_param("sss", $name, $email, $message);
if ($stmt->execute()) {
    echo json_encode(['status'=>'success','message'=>'Pesan berhasil dikirim']);
} else {
    http_response_code(500);
    echo json_encode(['status'=>'error','message'=>'Gagal menyimpan pesan']);
}
$stmt->close();
$conn->close();
