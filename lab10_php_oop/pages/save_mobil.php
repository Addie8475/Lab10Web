<?php
require_once "../classes/Database.php";
$db = new Database();

$data = [
    "merk" => $_POST['merk'],
    "model" => $_POST['model'],
    "tahun" => $_POST['tahun'],
    "harga" => $_POST['harga']
];

$db->insert("mobil", $data);

header("Location: mobil.php");
exit;
