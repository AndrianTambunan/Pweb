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

    if ($_FILES["picture"]["size"] > 0) {
        $picture_path = uploadFile();
        $sql = "UPDATE students SET nrp='$nrp', name='$name', gender='$gender', phone='$phone', address='$address', picture_data='$picture_path' WHERE id=$id";
    } else {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles.css"> 
    <title>Edit Student</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Student</h1>

        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">

            <div class="mb-3">
                <label for="nrp" class="form-label">NRP:</label>
                <input type="text" name="nrp" value="<?= $row["nrp"] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" value="<?= $row["name"] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select name="gender" class="form-select" required>
                    <option value="Male" <?= ($row["gender"] == "Male") ? "selected" : "" ?>>Male</option>
                    <option value="Female" <?= ($row["gender"] == "Female") ? "selected" : "" ?>>Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" value="<?= $row["phone"] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" value="<?= $row["address"] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="picture" class="form-label">Picture:</label>
                <input type="file" name="picture" class="form-control" accept="image/*">
            </div>

            <?php if (!empty($row["picture_data"])) : ?>
                <img src="data:image/jpeg;base64,<?= base64_encode($row["picture_data"]) ?>" alt="Student Picture" class="img-thumbnail" style="width: 50px; height: 50px;"><br>
            <?php endif; ?>

            <input type="submit" value="Update Student" class="btn btn-primary">
        </form>

        <a href="index.php" class="btn btn-secondary mt-3">Back to Student List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
