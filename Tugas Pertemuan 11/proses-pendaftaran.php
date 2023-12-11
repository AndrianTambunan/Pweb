<?php
require_once("config.php");

if (isset($_POST['daftar'])) {
	$nama = mysqli_real_escape_string($db, $_POST['nama']);
	$alamat = mysqli_real_escape_string($db, $_POST['alamat']);
	$jenisKelamin = mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
    $agama = mysqli_real_escape_string($db, $_POST['agama']);
    $sekolahAsal = mysqli_real_escape_string($db, $_POST['sekolah_asal']);
		
	if (empty($nama) || empty($alamat) || empty($jenisKelamin) || empty($agama) || empty($sekolahAsal)) {
		if (empty($nama)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($alamat)) {
			echo "<font color='red'>Alamat field is empty.</font><br/>";
		}
		
		if (empty($jenisKelamin)) {
			echo "<font color='red'>Jenis Kelamin field is empty.</font><br/>";
		}

        if (empty($agama)) {
			echo "<font color='red'>Agama field is empty.</font><br/>";
		}

        if (empty($sekolahAsal)) {
			echo "<font color='red'>Sekolah Asal field is empty.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 

		$result = mysqli_query($db, "INSERT INTO calon_siswa (`nama`, `alamat`, `jenis_kelamin`, `agama`, `sekolah_asal`) VALUES ('$nama', '$alamat', '$jenisKelamin', '$agama', '$sekolahAsal')");
		
        if( $result ) {
            header('Location: index.php?status=sukses');
        } else {
            header('Location: index.php?status=gagal');
        }
	}
}
?>
</body>
</html>