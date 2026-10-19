<?php
require('../../fpdf/fpdf.php');
require '../../db.php'; // koneksi pakai PDO ya

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

// ===== Logo Sekolah =====
$pdf->Image('../logoicon.png', 15, 10, 25); // (x, y, width)

// ===== Kop Surat =====
$pdf->Ln(3);
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,6,'SD HASANAH QURANIC SCHOOL',0,1,'C');

$pdf->SetFont('Times','',11);
$pdf->Cell(200,6,'Jl. H. Awi No.6, RT.03/RW.03, Jatiluhur, Kec. Jatiasih, Kota Bks, Jawa Barat 17425',0,1,'C');
$pdf->Cell(200,6,'NPSN: 69988410 | Akreditasi: B | Telp: 0815-1676-019',0,1,'C');
$pdf->Ln(5);
// ===== Garis Bawah Ganda =====
$pdf->SetLineWidth(0.5);
$pdf->Line(10, $pdf->GetY()+2, 200, $pdf->GetY()+2);
$pdf->SetLineWidth(0.2);
$pdf->Line(10, $pdf->GetY()+4, 200, $pdf->GetY()+4);
$pdf->Ln(15);

// ===== Judul =====
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,10,'RANKING GURU',0,1,'C');
$pdf->Ln(5);

// ===== Tabel Header =====
$pdf->SetFont('Times','B',10);
$pdf->SetX(10);
$pdf->Cell(25,7,'PERINGKAT',1,0,'C');
$pdf->Cell(120,7,'NAMA GURU',1,0,'C');
$pdf->Cell(40,7,'NILAI AKHIR',1,1,'C');

// ===== Isi Tabel =====
$pdf->SetFont('Times','',10);
$no = 1;

try {
    $stmt = $pdo->query("SELECT hs.*, g.nama_guru 
    FROM hasil_saw hs
    JOIN guru g ON g.id = hs.id_guru
    ORDER BY hs.peringkat ASC");
    while ($p = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pdf->SetX(10);
        $pdf->Cell(25,6, $p['peringkat'],1,0,'C');
        $pdf->Cell(120,6, $p['nama_guru'],1,0);
        $pdf->Cell(40,6, $p['nilai_akhir']*100,1,1);
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
$html = '<pagebreak />';
$pdf->SetY(230); // Posisikan ke bawah halaman secara tetap
// Tanggal otomatis (Bahasa Indonesia)
date_default_timezone_set('Asia/Jakarta');

// Daftar nama hari dan bulan dalam bahasa Indonesia
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

// Ambil tanggal saat ini
$hari_ini = $hari[date('l')];
$tanggal = date('d');
$bulan_ini = $bulan[(int)date('m')];
$tahun = date('Y');

// Gabungkan format tanggal
$tanggal_lengkap = "$hari_ini $tanggal $bulan_ini $tahun";

$pdf->SetFont('Times','',11);
$pdf->Cell(130); // Geser ke kanan
$pdf->Cell(60,6,'Bekasi, '.$tanggal_lengkap,0,1,'C');
$pdf->Cell(130);
$pdf->Cell(60,6,'Kepala Sekolah,',0,1,'C');
$pdf->Ln(15); // Jarak tanda tangan

$pdf->Cell(130);
$pdf->SetFont('Times','BU',11); // Bold + Underline
$pdf->Cell(60,6,'_________________________',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(130);
$pdf->Cell(60,6,'NIP: -',0,1,'C');
$pdf->Output();
?>
