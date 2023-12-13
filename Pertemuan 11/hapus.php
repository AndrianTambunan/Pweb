<?php
require_once("config.php");

$id = $_GET['id'];

$result = mysqli_query($db, "DELETE FROM calon_siswa WHERE id = $id");

header("Location:list-siswa.php");