<?php
require '../../db.php';
$nama = $_GET['nama'];$nip = $_GET['nip'];
$stmt = $pdo->prepare("INSERT INTO guru (nama_guru, nip) VALUES (?, ?)");
$stmt->execute([$nama, $nip]);
header("Location: admin_kelolaguru.php");?>