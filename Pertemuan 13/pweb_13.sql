CREATE DATABASE pweb_13;
USE pweb_13;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nrp VARCHAR(20) NOT NULL,
    name VARCHAR(50) NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    phone VARCHAR(15) NOT NULL,
    address VARCHAR(255) NOT NULL,
    picture_path VARCHAR(255) NOT NULL
);