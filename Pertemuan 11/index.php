<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru | SMK Coding</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #302B27;">
    <div class="container">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="form-daftar.php">Daftar Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list-siswa.php">Pendaftar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <header class="text-center mt-4">
        <h3>Pendaftaran Siswa Baru</h3>
    </header>

    <div class="container mt-4">
        <h4>Menu</h4>
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="form-daftar.php">Daftar Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list-siswa.php">Pendaftar</a>
                </li>
            </ul>
        </nav>
    </div>

    <?php if(isset($_GET['status'])): ?>
    <div class="container mt-4">
        <?php if($_GET['status'] == 'sukses'): ?>
            <p class="text-success">Pendaftaran siswa baru berhasil!</p>
        <?php else: ?>
            <p class="text-danger">Pendaftaran gagal!</p>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
