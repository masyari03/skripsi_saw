<?php
session_start();
require '../db.php';
if ($_SESSION['role'] !== 'penilai') {
    header("Location: ../index.php");
    exit;}

$id_penilai = $_SESSION['user_id'];

// Dropdown: tetap semua guru
$guru = $pdo->query("SELECT * FROM guru")->fetchAll(PDO::FETCH_ASSOC);

// Ambil kriteria (limit 4 seperti sebelumnya)
$kriteria = $pdo->query("SELECT * FROM kriteria LIMIT 4")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html><html><head>
  <title>Dasboard Peniliai</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="robots" content="index,follow" />
  <link rel="stylesheet" href="../admin/style.css">
  <style>
       *{box-sizing:border-box;}  
body{margin:0;}  

:root{
  --gjs-t-color-primary:#cf549e;
  --gjs-t-color-secondary:#b9227d;
  --gjs-t-color-accent:#ffb347;
  --gjs-t-color-success:#28a745;
  --gjs-t-color-warning:#ffc107;
  --gjs-t-color-error:#dc3545;
}
.gjs-grid-column{flex:1 1 0%;padding:5px 0;}
.gjs-grid-row{display:flex;justify-content:flex-start;align-items:stretch;flex-direction:row;min-height:auto;padding:10px 0;}
.gjs-t-body{background-color:inherit;color:inherit;font-size:1rem;line-height:1.75rem;}
.gjs-t-h1{color:var(--gjs-t-color-secondary);font-size:1.5rem;line-height:2.5rem;}
.gjs-t-h2{color:#601843;font-size:1.2rem;line-height:1.75rem;}
.gjs-t-button{background-color:var(--gjs-t-color-primary);color:white;border-radius:0.3rem;}
.gjs-t-link{color:var(--gjs-t-color-primary);text-decoration:underline;}
.gjs-t-border{border-radius:0.3rem;border-color:#e0e0e0;}
.gjs-grid-column.feature-item{padding:15px;display:flex;flex-direction:column;gap:15px;min-width:30%;}
.gjs-grid-column.testimonial-item{
  padding:15px;display:flex;flex-direction:column;gap:15px;min-width:45%;
  background-color:rgba(247,247,247,0.23);border-radius:5px;align-items:flex-start;
  border:1px solid rgba(0,0,0,0.06);
}
.navbar{background-color:#222;color:#ddd;min-height:50px;width:100%;}
.navbar-container{max-width:950px;margin:0 auto;width:100%;flex:0 0 auto;align-self:center;display:inline;flex-direction:row;margin-right:32.2px;}
.navbar-items-c{display:inline-block;float:right;}
.navbar-container::after{content:"";clear:both;display:block;}
.navbar-brand{vertical-align:top;display:inline-block;padding:5px;min-height:50px;min-width:50px;color:inherit;text-decoration:none;}
.navbar-menu{padding:10px 0;display:block;float:right;margin:0;}
.navbar-menu-link{margin:0;color:inherit;text-decoration:none;display:inline-block;padding:10px 15px;}
.navbar-burger{margin:10px 0;width:45px;padding:5px 10px;display:none;float:right;cursor:pointer;}
.navbar-burger-line{padding:1px;background-color:white;margin:5px 0;}
table,th,td{border:1px solid rgb(72,9,9);}
th{background-color:#3492e9;}
td{background-color:#7aefef;}
#icbo3q-2-2{padding:10px;font-weight:500;font-family:Impact,Charcoal,sans-serif;color:rgba(10,10,10,1);font-size:40px;text-align:center;}
#i5ke2h-2-2{margin:10px;background-color:#d88456;border-radius:15px;font-family:"Comic Sans MS",cursive,sans-serif;font-weight:500;font-size:15px;line-height:32px;position:relative;left:15px;cursor:grab;}
#im9sjg-2-2-3{border-style:solid;}
#ib8d2t-2-2-3{
  width:90%;background-color:rgba(245,235,235,1);font-family:"Arial Black",Gadget,sans-serif;font-weight:600;
  border:2px solid rgba(13,12,12,1);margin-left:30px;
}
#iukm92{margin:0 110px 0 111px;}
#ib67v8{
  align-items:center;appearance:none;background-color:#FCFCFD;border-radius:4px;border-width:0;
  box-shadow:rgba(45,35,66,0.4) 0 2px 4px,rgba(45,35,66,0.3) 0 7px 13px -3px,#D6D6E7 0 -3px 0 inset;
  color:#36395A;cursor:pointer;display:inline-flex;font-family:"JetBrains Mono",monospace;
  height:30px;justify-content:center;line-height:1px;overflow:hidden;padding:0 16px;
  position:relative;text-decoration:none;transition:box-shadow .15s,transform .15s;
  font-size:14px;font-weight:600;
}
#itw6sf-3-4{width:48px;height:49px;}
#i77pqk-3-4{margin:5px;}
#ifgdtb-3-4{
  margin:0;width:100%;height:60px;
  background-image:linear-gradient(#c5c1c1 1%,#c5c1c1 100%);background-size:100% 100%;
}
#iycz3-2-3-4{align-items:center;flex-direction:column;gap:10px;margin-bottom:17px;}
#irz7b-2-3-4{justify-content:center;padding:14px 20px 15px;}
#ilv4ie-3-2-2-4-2{color:rgba(0,0,0,1);cursor:pointer;}
#ilv4ie-3-2-2-4-2-2{color:rgba(0,0,0,1);cursor:help;}
#isrxap{font-family:"Times New Roman",Times,serif;font-weight:600;font-size:16px;}
#ie8ybk{padding-bottom:18px;}
#ixq1wl{
  background-color:white;border:thin solid blue;border-radius:4px;display:flex;line-height:1.5em;
  padding:0.5em 3.5em 0.5em 1em;background-image:linear-gradient(45deg,white 50%,transparent 50%),linear-gradient(135deg,transparent 50%,white 50%),linear-gradient(to right,gray,gray);
  background-position:calc(100% - 13px) 1em,calc(100% - 20px) 1em,100% 0;
  background-size:5px 5px,5px 5px,2.5em 2.5em;background-repeat:no-repeat;border-color:grey;outline:0;
}
#iveedq{padding-bottom:15px;}
#isrxap-2{font-family:"Times New Roman",Times,serif;font-weight:600;font-size:16px;}
#icq955{border:3px solid;cursor:pointer;border-radius:10px;height:25px;width:70px;}
@media (max-width:992px){.gjs-grid-row{flex-direction:column;}}
@media (max-width:768px){
  .navbar-items-c{display:none;width:100%;}
  .navbar-burger{display:block;}
  .navbar-menu{width:100%;}
  .navbar-menu-link{display:block;}
  #i77pqk-3-4{width:107px;height:22px;margin:10px 10px 10px 2px;}
}
@media (max-width:480px){
  #ib8d2t-2-2-3{width:90%;}
  #itw6sf-3-4{width:52px;height:52px;}
  #i77pqk-3-4{width:137px;height:28px;margin-bottom:12px;margin-left:0;}
}
  </style><script>function editpass() {
      let password = prompt("Masukkan Password Baru:");
        if (!password) return; 
      let form = document.createElement("form");
        form.method = "POST";
        form.action = "edit_pass.php";
      let inputPassword = document.createElement("input");
          inputPassword.type = "hidden";
          inputPassword.name = "password";
          inputPassword.value = password;
          form.appendChild(inputPassword);
          document.body.appendChild(form);
          form.submit(); }</script></head>
<body id="ik9usf">
  <div id="irz7b-2-3-4" class="gjs-grid-row">
    <div id="iycz3-2-3-4" class="gjs-grid-column">
      <div id="ifgdtb-3-4" class="navbar">
        <div data-gjs="navbar" id="ia7v9u-3-4" class="navbar-container"><a href="dashboard_penilai.php" id="ijzg5o-3-4"
            class="navbar-brand"><img src="../admin/logoicon.png" id="itw6sf-3-4"/><img src="dashboard_penilai.png" id="i77pqk-3-4"/></a>
          <div id="ik1qgx-3-4" class="navbar-burger">
            <div id="id60oi-3-4" class="navbar-burger-line"></div>
            <div id="imt8oo-3-4" class="navbar-burger-line"></div>
            <div id="ib69go-3-4" class="navbar-burger-line"></div></div>
          <div data-gjs="navbar-items" id="ip6x0j-3-4" class="navbar-items-c">
            <nav id="ie1pcd-3-4" class="navbar-menu"><a id="ilv4ie-3-2-2-4-2" href="#" onclick="editpass()" class="navbar-menu-link">Ganti
                Password
              </a><a id="ilv4ie-3-2-2-4-2-2" href="../logout.php" class="navbar-menu-link">Logout
  </a></nav></div></div></div></div></div>
  <form action="proses_penilai.php" method="POST" id="iukm92">
    <div id="iveedq">
      <label id="isrxap">Pilih Guru</label>
      <select type="text" name="id_guru" id="ixq1wl"><
      <?php foreach ($guru as $g): ?>
      <option value="<?= $g['id'] ?>"><?= $g['nama_guru'] ?></option>
      <?php endforeach; ?>
  </select></div>
    <div id="ie8ybk">
    <?php foreach ($kriteria as $k): ?>
       <label id="isrxap-2"> <?= $k['nama_kriteria'] ?> (Bobot: <?= $k['bobot'] ?>)</label><br>
       <input type="number" id="icq955" step="1" min="1" max="5" name="nilai[<?= $k['id'] ?>]" required><br><br>
    <?php endforeach; ?></div>
    <div><button type="submit" id="ib67v8">Simpan nilai</button></div></form>

  <div id="ix30ov-2-2-2-2">
    <div id="i9jukn-2-2">
      <div id="i4g8z7">Cara Menggunakan : Simpan Nilai berfungsi untuk menyimpan atau update data ketika ternyata kita sudah menginput tetapi ada kesalahan maka kita isi ulang saja maka nilai lama akan diganti nilai baru</div><br>
  <div id="i4g8z7">Panduan Nilai : Isi nilai dengan nilai terendah 1 dan tertinggi 5 tidak boleh lebih</div>
  <ol id="ighqud">
        <li><div id="iqevok">Nilai 1 memiliki poin 0.2</div></li>
        <li><div>Nilai 2 memiliki poin 0.4</div></li>
        <li id="ims0ml">
          <div id="i1j7nk">Nilai 3 memiliki poin 0.6</div>
        </li><li id="ims0ml">
          <div id="i1j7nk">Nilai 4 memiliki poin 0.8</div>
        </li><li id="ims0ml">
          <div id="i1j7nk">Nilai 5 memiliki poin 1.0</div>
        </li></ol></div></div>
  <div id="i2g9q2-2-2" class="gjs-grid-row">
    <div id="ig8vd5-2-2" class="gjs-grid-column">
      <div id="icbo3q-2-2">
        <div>Nilai Guru</div>
      </div><button type="button" id="i5ke2h-2-2"><a href="cetak_nilai.php" style="text-decoration: none;color:black;"> Cetak Laporan</a></button>
   
      <?php $query = $pdo->prepare("SELECT 
        guru.nama_guru AS nama_guru,
        kriteria.nama_kriteria,
        penilaian.nilai
    FROM penilaian
    JOIN guru ON penilaian.id_guru = guru.id
    JOIN kriteria ON penilaian.id_kriteria = kriteria.id
    WHERE penilaian.id_penilai = ?
    ORDER BY guru.nama_guru, kriteria.id");
$query->execute([$id_penilai]);

$data = $query->fetchAll(PDO::FETCH_ASSOC);
$nilai_guru = [];
foreach ($data as $d) {
    $guru = $d['nama_guru'];
    $kriteria = $d['nama_kriteria'];
    $nilai = $d['nilai']*5;
    $nilai_guru[$guru][$kriteria] = $nilai;}
$kriteria_query = $pdo->query("SELECT * FROM kriteria ORDER BY id");
$kriteria_list = $kriteria_query->fetchAll(PDO::FETCH_ASSOC);?>
      <table id="ib8d2t-2-2-3" cellspacing="0" cellpadding="NaN">
    <thead id="ihtgpj-2-2-3">
        <tr style="background: lightblue;">
            <th>Nama Guru</th>
            <?php foreach ($kriteria_list as $k): ?>
                <th><?= $k['nama_kriteria'] ?></th>

            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody id="ihtgpj-2-2-3">
        <?php foreach ($nilai_guru as $nama => $kriteria): ?>
            <tr><td><?= $nama ?></td>
                <?php foreach ($kriteria_list as $k): ?>
                    <td><?= $kriteria[$k['nama_kriteria']] ?? '-' ?></td>
                <?php endforeach; ?></tr>
        <?php endforeach; ?>
    </tbody></table></div></div></body></html>

