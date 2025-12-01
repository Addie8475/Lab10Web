<?php
include "../classes/Form.php";
?>

<html>
<head><title>Input Mahasiswa</title></head>
<body>

<h3>Silahkan isi data mahasiswa:</h3>

<?php
$form = new Form("save_data.php", "Simpan Data");
$form->addField("nim", "NIM");
$form->addField("nama", "Nama");
$form->addField("alamat", "Alamat");
$form->display();
?>

</body>
</html>
