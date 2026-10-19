<?php
require '../../db.php';
// Ambil nilai dari form / URL
$nama = $_GET['nama'];
$bobot = $_GET['bobot'];
// Hitung jumlah data kriteria yang ada
$stmt = $pdo->query("SELECT COUNT(*) AS jumlah FROM kriteria");
$row = $stmt->fetch();
$jumlah = $row['jumlah'];
// Jika sudah ada 4 data, tampilkan alert dan kembali
if ($jumlah >= 4) {
    echo "<script>alert('Jumlah kriteria sudah mencapai batas maksimal (4)!'); window.history.back();</script>";
    exit;
}
// Jika belum 4, lakukan insert
$stmt = $pdo->prepare("INSERT INTO kriteria (nama_kriteria, bobot) VALUES (?, ?)");
$stmt->execute([$nama, $bobot]);
// Redirect kembali ke halaman admin_kriteria
header("Location: admin_kriteria.php");
exit;
?>

