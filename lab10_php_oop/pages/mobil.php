<?php
require_once __DIR__ . "/../classes/Database.php";
$db = new Database();
$mobil = $db->getAll("mobil");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mobil</title>
    <link rel="stylesheet" href="../assets/style.css?v=2">
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
    
    <!-- Header Section -->
    <div style="
        display:flex; 
        justify-content:space-between; 
        align-items:center;
        margin-bottom:20px;
    ">
        <h2 style="margin:0;">Data Mobil</h2>
        <a class="btn btn-success" href="form_mobil.php">+ Tambah Mobil</a>
    </div>

    <!-- Card Wrapper -->
    <div style="
        background:white;
        padding:25px;
        border-radius:10px;
        box-shadow:0 3px 10px rgba(0,0,0,0.08);
    ">
        
        <table>
            <tr>
                <th>ID</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Harga</th>
            </tr>

            <?php if (count($mobil) > 0): ?>
                <?php foreach ($mobil as $m): ?>
                    <tr>
                        <td><?= $m['id'] ?></td>
                        <td><?= $m['merk'] ?></td>
                        <td><?= $m['model'] ?></td>
                        <td><?= $m['tahun'] ?></td>
                        <td><?= number_format($m['harga'],0,',','.') ?></td>
                        
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" style="text-align:center;">Belum ada data mobil.</td></tr>
            <?php endif; ?>

        </table>

    </div>

</div>

</body>
</html>
