<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Daftar Siswa</h2>

        <?php
        $conn = new mysqli('localhost', 'root', '', 'pweb_10');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM siswa";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-bordered'>";
            echo "<thead class='thead-dark'><tr><th>ID</th><th>Nama</th><th>Jenis Kelamin</th><th>Alamat</th><th>Email</th><th>Kontak</th><th>Agama</th></tr></thead><tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["nama"]."</td><td>".$row["jenis_kelamin"]."</td><td>".$row["alamat"]."</td><td>".$row["email"]."</td><td>".$row["contact"]."</td><td>".$row["agama"]."</td></tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p class='alert alert-info'>Tidak ada data siswa.</p>";
        }

        $conn->close();
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
