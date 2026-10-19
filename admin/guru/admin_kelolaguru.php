<?php
session_start();
require '../../db.php';
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php"); exit;}
$guru = $pdo->query("SELECT * FROM guru")->fetchAll();
$penilai = $pdo->query("SELECT * FROM users WHERE role = 'penilai'")->fetchAll(); ?>
<!DOCTYPE html> <html><head>
  <title>admin_guru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="robots" content="index,follow">
  <link rel="stylesheet" href="../style.css">
<script>    
    function add_guru() {
      var nama = prompt("Masukan Nama Guru:"); if (!nama) return;
      var nip = prompt("Masukan No NIP:"); if (!nip) return;
      window.location.href = "proses_addguru.php?nama=" + encodeURIComponent(nama) + "&nip=" + encodeURIComponent(nip); }
    function delete_guru() {
    var id = prompt("Masukan ID Guru Yang Ingin Dihapus:");
    if (!id) return;  window.location.href = "proses_hapusguru.php?id=" + encodeURIComponent(id);}
</script></head>
<body id="i2olgp-2">
  <div id="irz7b-2-3" class="gjs-grid-row">
  <div id="iycz3-2-3" class="gjs-grid-column">
    <div id="ifgdtb-3" class="navbar">
  <div data-gjs="navbar" id="ia7v9u-3" class="navbar-container"><a href="admin_kelolaguru.php" id="ijzg5o-3" class="navbar-brand"><img src="../logoicon.png" id="itw6sf-3"/><img src="../dashboard.png" id="i77pqk-3"/></a>
    <div id="ik1qgx-3" class="navbar-burger">
      <div id="id60oi-3" class="navbar-burger-line"></div>
      <div id="imt8oo-3" class="navbar-burger-line"></div>
      <div id="ib69go-3" class="navbar-burger-line"></div></div>
    <div data-gjs="navbar-items" id="ip6x0j-3" class="navbar-items-c">
      <nav id="ie1pcd-3" class="navbar-menu"><a id="ilv4ie-4" href="../dashboard_admin.php"class="navbar-menu-link">Penilai
        </a><a id="iozwuz-3" class="navbar-menu-link" href="../saw/dashboard_hasilsaw.php">Ranking
        </a><a id="ilv4ie-3-2" class="navbar-menu-link" href="../bobot/admin_kriteria.php" >Bobot
        </a><a id="ilv4ie-3-2-2" href="../../logout.php" class="navbar-menu-link">Logout
        </a></nav></div></div></div></div></div>
  <div id="i2g9q2-2-3" class="gjs-grid-row">
    <div id="ih77if-2-2" class="gjs-grid-column">
      <div id="idxip7-2-2">
        <div>KELOLA GURU</div></div>
  <button type="button" id="i5c915-2-2" onclick="add_guru()">Tambah</button><button type="button" id="i5c915-2-2" onclick="delete_guru()">Hapus</button><button type="button" id="i5c915-2-2" ><a href="cetak_guru.php" style="color: black; text-decoration: none;">Cetak Laporan</a></button>
  <table id="ib8d2t-2-2" cellspacing="0" cellpadding="NaN">
    <tbody id="ihtgpj-2-2"><tr><th >ID</th>
        <th >Nama Guru</th><th >NUPTK</th></tr>
      <?php foreach ($guru as $g):
      echo "<tr >";
      echo "<td >" . $g["id"] . "</td>";
      echo "<td >" . $g["nama_guru"] . "</td>";
      echo "<td >" . $g["nip"] . "</td>";
      echo "</tr>";
        endforeach ?></tbody></table></div></div></body></html>


