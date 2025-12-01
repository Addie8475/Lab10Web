<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mobil</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Form Tambah Mobil</h2>

<form action="save_mobil.php" method="POST">
    <label>Merk:</label><br>
    <input type="text" name="merk" required><br><br>

    <label>Model:</label><br>
    <input type="text" name="model" required><br><br>

    <label>Tahun:</label><br>
    <input type="number" name="tahun" required><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" required><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>
