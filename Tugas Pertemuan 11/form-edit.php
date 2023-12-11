<?php
require_once("config.php");

$id = $_GET['id'];

$result = mysqli_query($db, "SELECT * FROM calon_siswa WHERE id = $id");

$resultData = mysqli_fetch_assoc($result);

$nama = $resultData['nama'];
$alamat = $resultData['alamat'];
$jenisKelamin = $resultData['jenis_kelamin'];
$agama = $resultData['agama'];
$sekolahAsal = $resultData['sekolah_asal'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data</title>
</head>
<body>
	<header>
		<h2>Edit Data Siswa Baru</h2>
	</header>
	<form name="edit" method="post" action="proses-edit.php">
		<table border="0">
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><textarea name="alamat"><?php echo $alamat; ?></textarea></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>
					
					<label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jenisKelamin == 'laki-laki') ? "checked": ""?>> Laki-laki</label>
					<label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jenisKelamin == 'perempuan') ? "checked": ""?>> Perempuan</label>
				</td>
			</tr>
			<tr> 
				<td>Agama</td>
				<td>
					<select name="agama">
						<option hidden>Masukkan Agama Anda</option>
						<option  <?php echo ($agama == 'Islam') ? "selected": ""?>>Islam</option>
						<option <?php echo ($agama == 'Kristen') ? "selected": ""?>>Kristen</option>
						<option <?php echo ($agama == 'Katolik') ? "selected": ""?>>Katolik</option>
						<option <?php echo ($agama == 'Hindu') ? "selected": ""?>>Hindu</option>
						<option <?php echo ($agama == 'Budha') ? "selected": ""?>>Budha</option>				
					</select>
				</td>
			</tr>
			<tr> 
				<td>Sekolah Asal</td>
				<td><input type="text" name="sekolah_asal" value="<?php echo $sekolahAsal; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>	
		</table>
	</form>
</body>
</html>