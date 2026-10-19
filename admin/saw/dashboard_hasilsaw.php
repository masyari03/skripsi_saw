<?php
session_start();
require '../../db.php';
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit;}
$hasil = $pdo->query("SELECT hs.*, g.nama_guru 
    FROM hasil_saw hs
    JOIN guru g ON g.id = hs.id_guru
    ORDER BY hs.peringkat ASC")->fetchAll(PDO::FETCH_ASSOC);?>
<!DOCTYPE html>
<html><head>
  <title>admin</title><meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="robots" content="index,follow" />
   <link rel="stylesheet" href="../style.css"></head>
<body id="i2olgp-2"><div id="irz7b-2-3" class="gjs-grid-row">
    <div id="iycz3-2-3" class="gjs-grid-column">
      <div id="ifgdtb-3" class="navbar">
    <div data-gjs="navbar" id="ia7v9u-3" class="navbar-container"><a href="dashboard_hasilsaw.php" id="ijzg5o-3"
        class="navbar-brand"><img src="../logoicon.png" id="itw6sf-3"/><img src="../dashboard.png" id="i77pqk-3"/></a>
      <div id="ik1qgx-3" class="navbar-burger">
        <div id="id60oi-3" class="navbar-burger-line"></div>
        <div id="imt8oo-3" class="navbar-burger-line"></div>
        <div id="ib69go-3" class="navbar-burger-line"></div></div>
      <div data-gjs="navbar-items" id="ip6x0j-3" class="navbar-items-c">
      <nav id="ie1pcd-3" class="navbar-menu"><a id="ilv4ie-4" href="../dashboard_admin.php" class="navbar-menu-link">Penilai
      </a><a id="iozwuz-3" class="navbar-menu-link" href=" ../guru/admin_kelolaguru.php">Guru
      </a><a id="ilv4ie-3-2" class="navbar-menu-link" href="../bobot/admin_kriteria.php">Bobot
      </a><a id="ilv4ie-3-2-2" href="../../logout.php" class="navbar-menu-link">Logout</a></nav>
      </div></div></div></div> </div>
    <div id="ix30ov-2-2-2-2">
      <div id="i9jukn-2-2">
        ⚠Tombol Hitung untuk menghitung data yang sudah ada dan otomatis menghapus data yang lama </div></div>
  <div id="i2g9q2-2-3" class="gjs-grid-row">
    <div id="ih77if-2-2" class="gjs-grid-column">
  <div id="idxip7-2-2">
    <div>HASIL AKHIR RANKING</div></div>
    <button type="button" id="i5c915-2-2"><a href="proses_saw.php" style="color: black; text-decoration: none;" id="ilv4ie-4-2-2">Hitung</a></button>
    <button type="button" id="i5c915-2-2"><a href="cetak_saw.php" style="color: black; text-decoration: none;" id="ilv4ie-4-2-2">Cetak Laporan</a></button>
  <table id="ib8d2t-2-2" cellspacing="0" cellpadding="NaN">
    <tbody id="ihtgpj-2-2">
      <tr ><th >Peringkat</th>
        <th>Nama Guru</th> <th >Nilai Akhir</th></tr>
      <?php foreach ($hasil as $row): ?>
    <tr><td ><?= $row['peringkat'] ?></td>
        <td ><?= $row['nama_guru'] ?></td>
        <td ><?= number_format($row['nilai_akhir'],2) ?></td></tr>
    <?php endforeach; ?></tbody></table></div></div></body></html>
