<?php
require '../db.php';
if (!isset($_POST['nama'], $_POST['username'], $_POST['password'])) { die("Data tidak lengkap.");}
$nama = $_POST['nama'];$username = $_POST['username'];
$password = $_POST['password'];$hash = hash('sha256', $password);
$stmt = $pdo->prepare("INSERT INTO users (username, password, nama_lengkap, role) VALUES (?, ?, ?, 'penilai')");
$stmt->execute([$username, $hash, $nama]);header("Location: dashboard_admin.php");exit;