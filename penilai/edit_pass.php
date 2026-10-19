<?php
session_start();
require '../db.php';$id = $_SESSION['user_id'];
$password = $_POST['password'];
$password_hash = hash('sha256', $password);
// Update ke database
$stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
$stmt->execute([$password_hash, $id]);
header("Location: dashboard_penilai.php"); exit;