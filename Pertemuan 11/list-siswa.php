<?php
require_once("config.php");

$result = mysqli_query($db, "SELECT * FROM calon_siswa ORDER BY id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru | SMK Coding</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        th {
            background-color: #302B27;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2>Siswa yang sudah mendaftar</h2>
        <p>
            <a href="form-daftar.php" class="btn btn-primary">Tambah Baru</a>
        </p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($res = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $res['nama'] . "</td>";
                    echo "<td>" . $res['alamat'] . "</td>";
                    echo "<td>" . $res['jenis_kelamin'] . "</td>";
                    echo "<td>" . $res['agama'] . "</td>";
                    echo "<td>" . $res['sekolah_asal'] . "</td>";
                    echo "<td><a href=\"form-edit.php?id=$res[id]\" class=\"btn btn-warning\">Edit</a> | 
                        <a href=\"hapus.php?id=$res[id]\" class=\"btn btn-danger\" onClick=\"return confirm('Anda yakin ingin menghapus ini?')\">Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
