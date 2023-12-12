<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    $conn->query("DELETE FROM students WHERE id=$id");
}
header("Location: index.php");
exit();
?>
