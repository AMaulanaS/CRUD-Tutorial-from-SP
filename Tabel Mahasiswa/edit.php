<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h1>Edit mahasiswa</h1>
    <a href="index.php">Kembali</a>
    <br>
    <br>
    <!-- skrip data user -->
	<?php
    include 'config.php';
    if (!empty($_GET['id'])) {
        $sql = "SELECT * FROM mahasiswa WHERE id = {$_GET['id']}";
        $query = mysqli_query($conn, $sql);
        $user = mysqli_fetch_object($query);
    } else {
        header('Location:index.php');
    }
?>
    <form method="post">
        <p>
            <label for="nama">Nama Lengkap</label><br>
            <input type="text" name="nama" id="nama" value="<?= $user->nama; ?>" required>
        </p>
        <p>
            <label>Jenis Kelamin</label><br>
            <label for="gender1">
                <input type="radio" name="gender" id="gender1" value="0" <?= $user->gender == 0 ? 'checked' : ''; ?>> Laki-Laki
            </label>
            <label for="gender2">
                <input type="radio" name="gender" id="gender2" value="1" <?= $user->gender == 1 ? 'checked' : ''; ?>> Perempuan
            </label>
        </p>
        <p>
            <label for="email">Alamat Email</label><br>
            <input type="text" name="email" id="email" value="<?= $user->email; ?>" required>
        </p>
        <p>
            <label for="alamat">Alamat</label><br>
            <textarea name="alamat" id="alamat" cols="30" rows="10" required><?= $user->alamat; ?></textarea>
        </p>
        <p>
            <button type="reset">Ulangi</button>
            <button type="submit" name="perbarui">Perbarui</button>
        </p>
    </form>
    <!-- skrip perbarui -->
	<?php
    if (isset($_POST['perbarui'])) {
        $sql = "UPDATE mahasiswa SET ";
        $sql .= "nama = '{$_POST['nama']}', gender = {$_POST['gender']}, email = '{$_POST['email']}', alamat = '{$_POST['alamat']}'";
        $sql .= " WHERE id = {$_GET['id']}";

        if (mysqli_query($conn, $sql)) {
            header('Location:index.php');
        } else {
            echo 'Terjadi kesalahan query.';
        }
    }
?>
</body>
</html>