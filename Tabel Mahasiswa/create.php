<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah mahasiswa</h1>
    <a href="index.php">Kembali</a>
    <br>
    <br>
    <form method="post">
        <p>
            <label for="nama">Nama Lengkap</label><br>
            <input type="text" name="nama" id="nama" required>
        </p>
        <p>
            <label>Jenis Kelamin</label><br>
            <label for="gender1">
                <input type="radio" name="gender" id="gender1" value="0" checked> Laki-Laki
            </label>
            <label for="gender2">
                <input type="radio" name="gender" id="gender2" value="1"> Perempuan
            </label>
        </p>
        <p>
            <label for="email">Alamat Email</label><br>
            <input type="text" name="email" id="email" required>
        </p>
        <p>
            <label for="alamat">Alamat</label><br>
            <textarea name="alamat" id="alamat" cols="30" rows="10" required></textarea>
        </p>
        <p>
            <button type="reset">Ulangi</button>
            <button type="submit" name="simpan">Simpan</button>
        </p>
    </form>
    <!-- skrip PHP -->
	<?php
    include 'config.php';

    if (isset($_POST['simpan'])) {
        $sql = "INSERT INTO mahasiswa(nama, gender, email, alamat) VALUES";
        $sql .= "('{$_POST['nama']}', {$_POST['gender']}, '{$_POST['email']}', '{$_POST['alamat']}')";

        if (mysqli_query($conn, $sql)) {
            header('Location:index.php');
        } else {
            echo 'Terjadi kesalahan query.';
        }
    }
?>
</body>
</html>