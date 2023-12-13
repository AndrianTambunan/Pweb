CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50),
    jenis_kelamin ENUM('Laki-laki', 'Perempuan'),
    alamat TEXT,
    email VARCHAR(50),
    contact VARCHAR(15),
    agama VARCHAR(20)
);
