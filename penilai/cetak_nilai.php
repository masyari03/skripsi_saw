<?php
session_start();
require('../fpdf/fpdf.php');
require '../db.php'; // koneksi pakai PDO

// Ambil ID penilai dari session
$id_penilai = $_SESSION['user_id'];

$pdf = new FPDF('L','mm','A4'); // Landscape
$pdf->AddPage();

// ===== Logo Sekolah =====
$pdf->Image('../admin/logoicon.png', 15, 10, 25);

// ===== Kop Surat =====
$pdf->Ln(3);
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,6,'SD HASANAH QURANIC SCHOOL',0,1,'C');

$pdf->SetFont('Times','',11);
$pdf->Cell(0,6,'Jl. H. Awi No.6, RT.03/RW.03, Jatiluhur, Kec. Jatiasih, Kota Bks, Jawa Barat 17425',0,1,'C');
$pdf->Cell(0,6,'NPSN: 69988410 | Akreditasi: B | Telp: 0815-1676-019',0,1,'C');

$pdf->SetLineWidth(0.5);
$pdf->Line(10, $pdf->GetY()+2, 287, $pdf->GetY()+2);
$pdf->SetLineWidth(0.2);
$pdf->Line(10, $pdf->GetY()+4, 287, $pdf->GetY()+4);
$pdf->Ln(15);

// ===== Judul =====
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,10,'DATA PENILAIAN GURU',0,1,'C');
$pdf->Ln(5);

// Ambil semua kriteria dulu
$kriteria = $pdo->query("SELECT * FROM kriteria ORDER BY id")->fetchAll();
$jumlahKriteria = count($kriteria);

// Header tabel
$pdf->SetFont('Times','B',8);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(60,7,'Nama Guru',1,0,'C');

foreach ($kriteria as $k) {
    $pdf->Cell(50,7,$k['nama_kriteria'],1,0,'C');
}
$pdf->Ln();

// Ambil guru yang dinilai oleh penilai ini
$guruListStmt = $pdo->prepare("
    SELECT DISTINCT g.id, g.nama_guru
    FROM penilaian p
    JOIN guru g ON p.id_guru = g.id
    WHERE p.id_penilai = ?
    ORDER BY g.nama_guru
");
$guruListStmt->execute([$id_penilai]);
$guruList = $guruListStmt->fetchAll();

$pdf->SetFont('Times','',10);
$no = 1;
foreach ($guruList as $g) {
    $pdf->Cell(10,7,$no++,1,0,'C');
    $pdf->Cell(60,7,$g['nama_guru'],1,0);

    // Ambil nilai berdasarkan id_penilai juga
    foreach ($kriteria as $k) {
        $stmt = $pdo->prepare("
            SELECT nilai 
            FROM penilaian 
            WHERE id_guru = ? 
              AND id_kriteria = ? 
              AND id_penilai = ?
        ");
        $stmt->execute([$g['id'], $k['id'], $id_penilai]);
        $nilai = $stmt->fetchColumn();
        $pdf->Cell(50,7,$nilai ?? '-',1,0,'C');
    }
    $pdf->Ln();
}
$html= '<pagebreak />';

// ===== Footer TTD =====
$pdf->SetY(-60);
date_default_timezone_set('Asia/Jakarta');

$hari = [
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
];
$bulan = [
    1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
    4 => 'April', 5 => 'Mei', 6 => 'Juni',
    7 => 'Juli', 8 => 'Agustus', 9 => 'September',
    10 => 'Oktober', 11 => 'November', 12 => 'Desember'
];

$hari_ini = $hari[date('l')];
$tanggal = date('d');
$bulan_ini = $bulan[(int)date('m')];
$tahun = date('Y');
$tanggal_lengkap = "$hari_ini $tanggal $bulan_ini $tahun";

$pdf->SetFont('Times','',11);
$pdf->Cell(200);
$pdf->Cell(70,6,'Bekasi, '.$tanggal_lengkap,0,1,'C');
$pdf->Cell(200);
$pdf->Cell(70,6,'Kepala Sekolah,',0,1,'C');
$pdf->Ln(15);
$pdf->Cell(200);
$pdf->SetFont('Times','BU',11);
$pdf->Cell(70,6,'_________________________',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(200);
$pdf->Cell(70,6,'NIP: -',0,1,'C');

$pdf->Output();
?>
