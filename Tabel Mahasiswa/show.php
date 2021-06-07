<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Show Data Mahasiswa</title>
</head>
<body>
    <h1>Data mahasiswa</h1>
    <a href="index.php">Kembali</a> - 
    <a href="edit.php?id=<?= $_GET['id'];?>">Edit</a>
    <br>
    <br>
    <!-- skrip PHP -->
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
    <p>
        <label>Nama Lengkap</label>
        <pre><?= $user->nama; ?></pre>
    </p>
    <p>
        <label>Jenis Kelamin</label>
        <pre><?= $user->gender == 0 ? 'Laki-Laki' : 'Perempuan'; ?></pre>
    </p>
    <p>
        <label>Alamat Email</label>
        <pre><?= $user->email; ?></pre>
    </p>
    <p>
        <label>Alamat</label>
        <pre><?= $user->alamat; ?></pre>
    </p>
</body>
</html>