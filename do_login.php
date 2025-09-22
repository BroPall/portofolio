<?php
// do_login.php
session_start();
include "db.php";

$u = $_POST['username'] ?? '';
$p = $_POST['password'] ?? '';

// default credentials -- ganti sesuai kebutuhan
$ADMIN_USER = 'admin';
$ADMIN_PASS = 'admin123';

// very simple check (you can replace with DB check)
if ($u === $ADMIN_USER && $p === $ADMIN_PASS) {
    $_SESSION['admin_logged'] = true;
    header("Location: messages.php");
    exit;
} else {
    $_SESSION['admin_error'] = "Username atau password salah";
    header("Location: login.php");
    exit;
}
