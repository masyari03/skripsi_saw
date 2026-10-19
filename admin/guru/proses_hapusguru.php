<?php
require '../../db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM guru WHERE id = ?");
$stmt->execute([$id]);
header("Location: admin_kelolaguru.php");
exit; ?>