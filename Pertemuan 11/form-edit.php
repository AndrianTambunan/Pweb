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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h2 class="text-center">Edit Data Siswa Baru</h2>
                    </div>
                    <div class="card-body">
                        <form name="edit" method="post" action="proses-edit.php">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat"><?php echo $alamat; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki" <?php echo ($jenisKelamin == 'laki-laki') ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan" <?php echo ($jenisKelamin == 'perempuan') ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama">
                                    <option hidden>Masukkan Agama Anda</option>
                                    <option <?php echo ($agama == 'Islam') ? "selected" : ""; ?>>Islam</option>
                                    <option <?php echo ($agama == 'Kristen') ? "selected" : ""; ?>>Kristen</option>
                                    <option <?php echo ($agama == 'Katolik') ? "selected" : ""; ?>>Katolik</option>
                                    <option <?php echo ($agama == 'Hindu') ? "selected" : ""; ?>>Hindu</option>
                                    <option <?php echo ($agama == 'Budha') ? "selected" : ""; ?>>Budha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sekolah_asal">Sekolah Asal</label>
                                <input type="text" class="form-control" name="sekolah_asal" value="<?php echo $sekolahAsal; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value=<?php echo $id; ?>>
                                <input type="submit" class="btn btn-primary" name="update" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for certain features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
