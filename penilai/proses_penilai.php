<?php
session_start();
require '../db.php';
if ($_SESSION['role'] !== 'penilai') {
    header("Location: ../index.php");exit;}
$id_penilai = $_SESSION['user_id'];
$id_guru = $_POST['id_guru'];
$nilai_input = $_POST['nilai'];
// Konversi nilai dari skala 1–5 ke 0.2–1.0
function konversiSkor($angka) {
    switch ($angka) {
        case 5: return 1.0;
        case 4: return 0.8;
        case 3: return 0.6;
        case 2: return 0.4;
        case 1: return 0.2;
        default: return 0.0;}}
// Hapus penilaian lama
$pdo->prepare("DELETE FROM penilaian WHERE id_penilai = ? AND id_guru = ?")->execute([$id_penilai, $id_guru]);
// Simpan penilaian baru
foreach ($nilai_input as $id_kriteria => $angka) {
    $nilai_skor = konversiSkor((int)$angka);
    $stmt = $pdo->prepare("INSERT INTO penilaian (id_guru, id_kriteria, id_penilai, nilai) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id_guru, $id_kriteria, $id_penilai, $nilai_skor]);}
header("Location: dashboard_penilai.php");

