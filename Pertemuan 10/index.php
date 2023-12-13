<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Formulir Data Siswa</h2>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select class="form-control" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" name="alamat" required></textarea>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="contact">Kontak:</label>
                <input type="text" class="form-control" name="contact" required>
            </div>
            <div class="form-group">
                <label for="agama">Agama:</label>
                <input type="text" class="form-control" name="agama" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" style="background-color: #302B27;">Submit</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $conn = new mysqli('localhost', 'root', '', 'pweb_10');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $nama = $_POST['nama'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $agama = $_POST['agama'];

            $sql = "INSERT INTO siswa (nama, jenis_kelamin, alamat, email, contact, agama) VALUES ('$nama', '$jenis_kelamin', '$alamat', '$email', '$contact', '$agama')";

            if ($conn->query($sql) === TRUE) {
                header("Location: list_siswa.php");
                exit();
            } else {
                echo "<p class='mt-3 alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
