<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pendaftaran Siswa Baru</title>
</head>
<body>
	<header>
		<h2>Pendaftaran Siswa Baru</h2>
	</header>

	<form action="proses-pendaftaran.php" method="post" name="add">
		<fieldset>
			<table width="25%" border="0">
				<tr> 
					<td>Nama</td>
					<td><input type="text" name="nama"></td>
				</tr>
				<tr> 
					<td>Alamat</td>
					<td><textarea name="alamat"></textarea></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>
						<label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
						<label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
					</td>
				</tr>
				<tr> 
					<td>Agama</td>
					<td>
						<select name="agama">
							<option hidden>Masukkan Agama Anda</option>
							<option>Islam</option>
							<option>Kristen</option>
							<option>Katolik</option>
							<option>Hindu</option>
							<option>Budha</option>							
						</select>
					</td>
				</tr>
				<tr> 
					<td>Sekolah Asal</td>
					<td><input type="text" name="sekolah_asal"></td>
				</tr>
				<tr> 
					
					<td><input type="submit" name="daftar" value="Daftar"></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>