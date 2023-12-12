<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT picture_data FROM students WHERE id = $id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        header('Content-Type: image/jpeg');
        echo base64_decode($row['picture_data']);
        exit();
    }
}

// If no image found, provide a default image from the same directory.
header('Content-Type: image/jpeg');
echo file_get_contents('default-image.jpg');
exit();
?>
