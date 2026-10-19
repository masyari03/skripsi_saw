<?php
session_start();
require '../db.php';
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");exit;}
// Ambil data guru dan penilai
$guru = $pdo->query("SELECT * FROM guru")->fetchAll();
$penilai = $pdo->query("SELECT * FROM users WHERE role = 'penilai'")->fetchAll();?>
<!DOCTYPE html>
<html><head>
  <title>admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="robots" content="index,follow">
   <link rel="stylesheet" href="style.css">
<script> function tambahpenilai() {
    let nama = prompt("Masukkan Nama Lengkap Penilai:");if (!nama) return;
    let username = prompt("Masukkan Username:"); if (!username) return;
    let password = prompt("Masukkan Password:"); if (!password) return;
    let form = document.createElement("form"); form.method = "POST";
    form.action = "tambah_penilai.php";
    let inputNama = document.createElement("input");
    inputNama.type = "hidden"; inputNama.name = "nama";
    inputNama.value = nama; form.appendChild(inputNama);
    let inputUsername = document.createElement("input");
    inputUsername.type = "hidden"; inputUsername.name = "username";
    inputUsername.value = username; form.appendChild(inputUsername);
    let inputPassword = document.createElement("input"); inputPassword.type = "hidden";
    inputPassword.name = "password"; inputPassword.value = password;
    form.appendChild(inputPassword);
    document.body.appendChild(form);form.submit(); }
    function hapuspenilai() {
        let id = prompt("Masukkan ID penilai yang ingin dihapus:");
        if (!id) return; window.location.href = "proses_hapuspenilai.php?id=" + id;}
    </script> </head>
<body id="i2olgp-2"> <div id="irz7b-2-3" class="gjs-grid-row">
    <div id="iycz3-2-3" class="gjs-grid-column"> <div id="ifgdtb-3" class="navbar">
        <div data-gjs="navbar" id="ia7v9u-3" class="navbar-container"><a href="dashboard_admin.php" id="ijzg5o-3"
            class="navbar-brand"><img src="logoicon.png" id="itw6sf-3"/><img src="dashboard.png" id="i77pqk-3"/></a>
          <div id="ik1qgx-3" class="navbar-burger">
            <div id="id60oi-3" class="navbar-burger-line"></div>
            <div id="imt8oo-3" class="navbar-burger-line"></div>
            <div id="ib69go-3" class="navbar-burger-line"></div></div>
          <div data-gjs="navbar-items" id="ip6x0j-3" class="navbar-items-c">
            <nav id="ie1pcd-3" class="navbar-menu"><a id="ilv4ie-4" href="guru/admin_kelolaguru.php"
                class="navbar-menu-link">Guru
              </a><a id="iozwuz-3" href="saw/dashboard_hasilsaw.php" class="navbar-menu-link">Ranking
              </a><a id="ilv4ie-3-2" href="bobot/admin_kriteria.php" class="navbar-menu-link">Bobot
              </a><a id="ilv4ie-3-2-2" href="../logout.php" class="navbar-menu-link">Logout</a></nav>
          </div></div></div></div></div>
  <div id="i2g9q2-2-3" class="gjs-grid-row">
    <div id="ih77if-2-2" class="gjs-grid-column">
    <div id="idxip7-2-2">
      <div>KELOLA TIM PENILAI</div>
    </div><button type="button" onclick="tambahpenilai()" id="i5c915-2-2">Tambah</button>
    <button type="button" onclick="hapuspenilai()" id="i5c915-2-2">Hapus</button>
    <button type="button" id="i5c915-2-2"><a href="cetak_penilai.php" style="color: black; text-decoration: none;">Cetak Laporan</a></button>
    <table id="ib8d2t-2-2" cellspacing="0" cellpadding="NaN">
      <tbody id="ihtgpj-2-2">
        <tr ><th >ID</th><th>Nama Guru</th><th >Username</th></tr>
        <?php foreach ($penilai as $p):?>
        <tr><td ><?= $p["id"] ?> </td>
        <td ><?= $p["nama_lengkap"] ?></td>
        <td><?= $p["username"] ?></td></tr><?php endforeach ?>
</tbody></table></div></div></body></html>

