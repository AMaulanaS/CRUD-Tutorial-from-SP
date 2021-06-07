<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Semua data mahasiswa</h1>
    <a href="create.php">Tambah mahasiswa</a>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- skrip PHP -->
			<?php
    // memanggil berkas dari koneksi basis data
    include 'config.php';
// ini untuk mengahapus data
if (isset($_GET['delete'])) {
    $sql = "DELETE FROM mahasiswa WHERE id = {$_GET['delete']}";
    if (mysqli_query($conn, $sql)) {
        header('Location:index.php');
    }
}
    // menampilkan data mahasiswa
    $no = 1;
    $query = mysqli_query($conn, "SELECT * FROM mahasiswa");
    while ($item = mysqli_fetch_object($query)) {
?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $item->nama; ?></td>
        <td><?= $item->gender == 0 ? 'Laki-Laki' : 'Perempuan'; ?></td>
        <td><?= $item->email; ?></td>
        <td><?= $item->alamat; ?></td>
        <td>
            <a href="edit.php?id=<?= $item->id; ?>">Edit</a>
            <a href="show.php?id=<?= $item->id; ?>">Show</a>
			<a href="?delete=<?= $item->id; ?> "onclick="return confirm('Apakah Anda yakin ingin mengapus item ini?')"> Hapus </a>
        </td>
    </tr>
<?php } ?>
        </tbody>
    </table>
</body>
</html>