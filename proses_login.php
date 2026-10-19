<?php
session_start(); require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';$password = $_POST['password'] ?? '';
    // Enkripsi password dengan SHA-256
    $password_hash = hash('sha256', $password);
    try {// Siapkan statement SQL
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
    $stmt->bindParam(':username', $username); $stmt->execute();
    // Ambil data user
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && $user['password'] === $password_hash) {
    // Simpan data ke sesi
    $_SESSION['user_id'] = $user['id'];$_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    // Redirect berdasarkan role
    if ($user['role'] === 'admin') {
        header("Location: admin/dashboard_admin.php"); exit();
    } elseif ($user['role'] === 'penilai') {
        header("Location: penilai/dashboard_penilai.php"); exit();} else {
        echo "Role tidak dikenali.";}} else {
        echo "<script>alert('Username atau Password salah!'); window.location.href='index.php';</script>";}
    } catch (PDOException $e) {echo "Terjadi kesalahan: " . $e->getMessage();}} else {
    echo "<script>alert('Jangan Hack'); window.location.href='index.php';</script>";}?>