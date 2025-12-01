<?php
include "../classes/Form.php";
?>

<html>
<head>
    <title>Input Mahasiswa</title>
    <link rel="stylesheet" href="../assets/form.css">
</head>
<body>

<div class="form-container">
    <h3>Input Data Mahasiswa</h3>

    <?php
    $form = new Form("save_data.php", "Simpan Data");
    $form->addField("nim", "NIM");
    $form->addField("nama", "Nama");
    $form->addField("alamat", "Alamat");
    $form->display();
    ?>

    <a class="back-btn" href="dashboard.php">← Kembali ke Dashboard</a>
</div>

</body>
</html>
