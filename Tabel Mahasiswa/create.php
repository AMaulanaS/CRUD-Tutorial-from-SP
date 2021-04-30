<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h1>Tambah Mahasiswa</h1>
	<a href="index.php">kembali</a>
	<br>
	<br>
	<form method="post">
		<p>
			<label for="nama">Nama Lengkap</label><br>
			<input type="text" name="nama" id="nama" required>
			</p>
			<p>
				<label>jenis kelamin</label><br>
				<label for="gender1">
					<input type="radio" name="gender" id="gender1" value="0" checked> Laki-laki
				</label>
				<label for="gender2">
					<input type="radio" name="gender" id="gender2" value="1" > Perempuan
				</label>
			</p>
			<p>
				<label for="email">Alamat Email</label><br>
				<input type="text" name="email" id="email" required>
			</p>
			<p>
				<label for="alamat">alamat email</label><br>
				<textarea name="alamat" id="alamat" cols="30" rows="10" required></textarea>
			</p>
			<p>
				<button type="reset">Ulangi</button>
				<button type= submit" name="simpan">Simpan</button>
			</p>
		</form>
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