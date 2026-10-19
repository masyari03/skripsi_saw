<?php
require '../../db.php';
$id = $_GET['id']; $nama = $_GET['nama']; $bobot = $_GET['bobot'];
$stmt = $pdo->prepare("UPDATE kriteria SET nama_kriteria = ?, bobot = ? WHERE id = ?");
$stmt->execute([$nama, $bobot, $id]); header("Location: admin_kriteria.php");

