<?php
include 'connection.php';

// Function to handle file upload
function uploadFile()
{
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["picture"]["name"]);

    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile)) {
        return $targetFile;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    return "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nrp = $_POST["nrp"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    // Check if a new image is uploaded
    if ($_FILES["picture"]["size"] > 0) {
        $picture_path = uploadFile();
        $sql = "UPDATE students SET nrp='$nrp', name='$name', gender='$gender', phone='$phone', address='$address', picture_data='$picture_path' WHERE id=$id";
    } else {
        // If no new image is uploaded, update other fields without modifying the image
        $sql = "UPDATE students SET nrp='$nrp', name='$name', gender='$gender', phone='$phone', address='$address' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Edit Student</title>
</head>

<body>
    <h1>Edit Student</h1>

    <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $row["id"] ?>">

        <label for="nrp">NRP:</label>
        <input type="text" name="nrp" value="<?= $row["nrp"] ?>" required><br>

        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $row["name"] ?>" required><br>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male" <?= ($row["gender"] == "Male") ? "selected" : "" ?>>Male</option>
            <option value="Female" <?= ($row["gender"] == "Female") ? "selected" : "" ?>>Female</option>
        </select><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?= $row["phone"] ?>" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="<?= $row["address"] ?>" required><br>

        <label for="picture">Picture:</label>
        <input type="file" name="picture" accept="image/*"><br>

        <?php if (!empty($row["picture_data"])) : ?>
            <img src="data:image/jpeg;base64,<?= base64_encode($row["picture_data"]) ?>" alt="Student Picture" style="width: 50px; height: 50px;"><br>
        <?php endif; ?>

        <input type="submit" value="Update Student">
    </form>

    <a href="index.php">Back to Student List</a>
</body>

</html>
