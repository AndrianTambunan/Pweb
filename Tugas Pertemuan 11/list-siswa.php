<?php
require_once("config.php");

$result = mysqli_query($db, "SELECT * FROM calon_siswa ORDER BY id");
?>

<html>
<head>	
	<title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<h2>Siswa yang sudah mendaftar</h2>
	<p>
        <a href="form-daftar.php">[+] Tambah Baru</a>
	</p>
	<table width='60%' border=1>
		<tr bgcolor='#DDDDDD'>
			<td><strong>Nama</strong></td>
			<td><strong>Alamat</strong></td>
			<td><strong>Jenis Kelamin</strong></td>
            <td><strong>Agama</strong></td>
            <td><strong>Sekolah Asal</strong></td>
			<td><strong>Tindakan</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res['nama']."</td>";
			echo "<td>".$res['alamat']."</td>";
			echo "<td>".$res['jenis_kelamin']."</td>";
            echo "<td>".$res['agama']."</td>";	
            echo "<td>".$res['sekolah_asal']."</td>";		
			echo "<td><a href=\"form-edit.php?id=$res[id]\">Edit</a> | 
			<a href=\"hapus.php?id=$res[id]\" onClick=\"return confirm('Anda yakin ingin menghapus ini?')\">Hapus</a></td>";
		}
		?>
	</table>
</body>
</html>