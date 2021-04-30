<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Show Data Mahasiswa</title>
</head>
<body>
	<h1>Data Mahasiswa</h1>
	<a href="index.php">Kembali</a> -
	<a href="edit.php?id=<?= $_GET['id'];?>">Edit</a>
	<br>
	<br>
	<?php
		include 'config.php';
		if (!empty($_GET['id'])) {
			$sql = "SELECT * From mahasiswa Where id = {$_GET['id]}";
			$query = mysqli_query ($conn, $sql);
			$user = mysql_fetch_object($query);
		} else {
		header ('Location:index.php');
		}
	?>
	
	<p>
		<label>Nama Lengkap</label>
		<pre><?= $user->nama; ?></pre>
	</p>
	<p>
		<label>Jenis Kelamin</label>
		<pre><?= $user->gender; ?></pre>
	</p>
	<p>
		<label>alamat Email</label>
		<pre><?= $user->email; ?></pre>
	</p>
	<p>
		<label>alamat/label>
		<pre><?= $user->alamat; ?></pre>
	</p>
	</body>
	</html>
	
	
	