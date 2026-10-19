<?php
require '../../db.php';
// 1. Ambil semua guru dan kriteria
$guru = $pdo->query("SELECT * FROM guru")->fetchAll(PDO::FETCH_ASSOC);
$kriteria = $pdo->query("SELECT * FROM kriteria")->fetchAll(PDO::FETCH_ASSOC);
// 2. Hitung rata-rata nilai tiap guru-kriteria
$nilai_rata = [];
foreach ($guru as $g) {
    $id_guru = $g['id'];
    foreach ($kriteria as $k) {
        $id_kriteria = $k['id'];
        $stmt = $pdo->prepare("SELECT AVG(nilai) as rata FROM penilaian WHERE id_guru = ? AND id_kriteria = ?");
        $stmt->execute([$id_guru, $id_kriteria]);
        $rata = $stmt->fetchColumn();
        $nilai_rata[$id_guru][$id_kriteria] = $rata ?: 0;}}
// 3. Normalisasi
$normalisasi = [];
foreach ($kriteria as $k) {
    $id_kriteria = $k['id'];
    $max = 1;
    foreach ($guru as $g) {
        $id_guru = $g['id'];
        if ($nilai_rata[$id_guru][$id_kriteria] > $max) {
            $max = $nilai_rata[$id_guru][$id_kriteria];}}
    foreach ($guru as $g) {
        $id_guru = $g['id'];
        $nilai = $nilai_rata[$id_guru][$id_kriteria];
        $normalisasi[$id_guru][$id_kriteria] = ($max != 0) ? $nilai / $max : 0;}}
// 4. Hitung nilai akhir SAW
$hasil = [];
foreach ($guru as $g) {
    $id_guru = $g['id'];
    $total = 0;
    foreach ($kriteria as $k) {
        $id_kriteria = $k['id'];
        $bobot = $k['bobot'];
        $total += $normalisasi[$id_guru][$id_kriteria] * $bobot;}
    $hasil[$id_guru] = $total;}
// 5. Simpan ke tabel hasil_saw (bersihkan dulu)
$pdo->exec("DELETE FROM hasil_saw");
// 6. Urutkan dan beri peringkat
arsort($hasil);
$peringkat = 1;
foreach ($hasil as $id_guru => $nilai) {
    $stmt = $pdo->prepare("INSERT INTO hasil_saw (id_guru, nilai_akhir, peringkat) VALUES (?, ?, ?)");
    $stmt->execute([$id_guru, $nilai, $peringkat]);
    $peringkat++;}
header("Location: dashboard_hasilsaw.php");
