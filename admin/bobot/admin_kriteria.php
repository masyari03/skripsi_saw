<?php
session_start();
require '../../db.php';
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");exit;
}$kriteria = $pdo->query("SELECT * FROM kriteria order by id asc limit 4")->fetchAll();?>
<!DOCTYPE html><html><head>
  <title>admin</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="robots" content="index,follow" />
  <meta name="generator" content="GrapesJS Studio" />
<link rel="stylesheet" href="../style.css"><script>
function tambahKriteria() {
      let nama = prompt("Nama kriteria:");if (!nama) return;
      let bobot = prompt("Bobot (0-5):");if (!bobot) return;
      window.location.href = "tambah_kriteria.php?nama=" + encodeURIComponent(nama) + "&bobot=" + bobot;}
  function editKriteria(id) {
    let nama = prompt("Nama kriteria:");
      if (!nama) return;  let bobot = prompt("Bobot baru:");
      if (!bobot) return;
      window.location.href = "edit_kriteria.php?id=" + id + "&nama=" + encodeURIComponent(nama) + "&bobot=" + bobot;}
</script></head>
<body id="i2olgp-2"><div id="irz7b-2-3" class="gjs-grid-row">
<div id="iycz3-2-3" class="gjs-grid-column">
  <div id="ifgdtb-3" class="navbar">
    <div data-gjs="navbar" id="ia7v9u-3" class="navbar-container"><a href="admin_kelolaguru.php" id="ijzg5o-3"
        class="navbar-brand"><img src="../logoicon.png" id="itw6sf-3"/><img src="../dashboard.png" id="i77pqk-3"/></a>
      <div id="ik1qgx-3" class="navbar-burger">
        <div id="id60oi-3" class="navbar-burger-line"></div>
        <div id="imt8oo-3" class="navbar-burger-line"></div>
        <div id="ib69go-3" class="navbar-burger-line"></div></div>
      <div data-gjs="navbar-items" id="ip6x0j-3" class="navbar-items-c">
          <nav id="ie1pcd-3" class="navbar-menu"><a id="ilv4ie-4" href="../dashboard_admin.php" class="navbar-menu-link">Penilai
          </a><a id="iozwuz-3" class="navbar-menu-link" href=" ../guru/admin_kelolaguru.php">Guru
          </a><a id="iozwuz-3" class="navbar-menu-link" href="../saw/dashboard_hasilsaw.php">Ranking
          </a><a id="ilv4ie-3-2-2" href="../../logout.php" class="navbar-menu-link">Logout
          </a></nav></div></div></div></div></div>
<div id="ix30ov-2-2-2-2">
    <div id="i9jukn-2-2">
      <pre>⚠Bobot tidak boleh lebih dari 4 max, jika mau rubah maka tekan tombol edit dia otomatis mengganti

      Bobot harus ditulis dalam angka decimal seperti 0.1 dst
      </pre> </div></div>
<div id="i2g9q2-2-3" class="gjs-grid-row">
  <div id="ih77if-2-2" class="gjs-grid-column">
    <div id="idxip7-2-2"><div>KELOLA BOBOT</div></div>
      <button type="button"  onclick="tambahKriteria()" id="i5c915-2-2">Tambah</button><button type="button" id="i5c915-2-2"><a href="cetak_kriteria.php" style="color: black; text-decoration: none;">Cetak Laporan</a></button>
  <table id="ib8d2t-2-2" cellspacing="0" cellpadding="NaN">
    <tbody id="ihtgpj-2-2">
      <tr><th>Nama Kriteria</th><th >Bobot</th>
        <th >Persen</th><th >Edit</th></tr>
      <?php foreach ($kriteria as $k):?>
        <tr id='i74oih-2-2'><tr ><td ><?= $k['nama_kriteria'] ?></td>
        <td ><?= $k['bobot']?></td>
        <td ><?= $hasil=$k['bobot']*100 ?>%</td>
        <td ><a href="#" onclick="editKriteria(<?= $k['id'] ?>)"> <pre>✏️  </pre></a>
        </td> </tr> </tbody><?php endforeach; ?> 
    </table> </div></div></body></html>