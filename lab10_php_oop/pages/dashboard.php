<?php
include "../classes/Database.php";

$db = new Database();
$mahasiswa = $db->getAll("mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="../assets/dashboard.css">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>My Dashboard</h2>
    <a href="dashboard.php">🏠 Home</a>
    <a href="mobil.php">🚗 Mobil</a>
    <a href="form_input.php">➕ Tambah Mahasiswa</a>
</div>

<!-- MAIN CONTENT -->
<div class="main">

    <div class="dashboard-title">Data Mahasiswa</div>
    <div class="dashboard-subtitle">Daftar mahasiswa yang tersimpan di database.</div>

    <!-- CARD STAT -->
    <div class="card-container">
        <div class="card">
            <div class="card-title">Total Mahasiswa</div>
            <div class="card-value"><?= count($mahasiswa) ?></div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                </tr>
            </thead>

            <tbody>
            <?php 
            if (!empty($mahasiswa)) {
                $no = 1;
                foreach ($mahasiswa as $mhs) {
                    echo "
                    <tr>
                        <td>{$no}</td>
                        <td>{$mhs['nim']}</td>
                        <td>{$mhs['nama']}</td>
                        <td>{$mhs['alamat']}</td>
                    </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='4' class='no-data'>Belum ada data.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        &copy; <?= date("Y") ?> Dashboard OOP PHP — Dibuat oleh Aditya
    </div>

</div>

</body>
</html>
