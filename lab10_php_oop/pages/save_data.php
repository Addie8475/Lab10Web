<?php
include "../classes/Database.php";

$db = new Database();

$data = [
    'nim'    => $_POST['nim'],
    'nama'   => $_POST['nama'],
    'alamat' => $_POST['alamat']
];

if ($db->insert("mahasiswa", $data)) {
    // Redirect ke dashboard setelah input berhasil
    header("Location: dashboard.php");
    exit;
} else {
    echo "Gagal menyimpan data.";
}
?>
