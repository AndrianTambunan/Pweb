<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nrp = $_POST["nrp"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    // File Upload Handling
    $image_data = uploadFile();

    $sql = "INSERT INTO students (nrp, name, gender, phone, address, picture_data) VALUES ('$nrp', '$name', '$gender', '$phone', '$address', '$image_data')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to handle file upload
function uploadFile()
{
    $image_data = file_get_contents($_FILES["picture"]["tmp_name"]);
    return base64_encode($image_data);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Add New Student</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Add New Student</h1>

        <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nrp" class="form-label">NRP:</label>
                <input type="text" name="nrp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select name="gender" class="form-select" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="picture" class="form-label">Picture:</label>
                <input type="file" name="picture" class="form-control" accept="image/*">
            </div>

            <input type="submit" value="Add Student" class="btn btn-primary">
        </form>

        <a href="index.php" class="btn btn-secondary mt-3">Back to Student List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
