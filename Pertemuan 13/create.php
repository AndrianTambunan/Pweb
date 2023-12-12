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
    <link rel="stylesheet" href="assets/styles.css">
    <title>Add New Student</title>
</head>

<body>
    <h1>Add New Student</h1>

    <form method="post" action="" enctype="multipart/form-data">
        <label for="nrp">NRP:</label>
        <input type="text" name="nrp" required><br>

        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br>

        <label for="picture">Picture:</label>
        <input type="file" name="picture" accept="image/*"><br>

        <input type="submit" value="Add Student">
    </form>

    <a href="index.php">Back to Student List</a>
</body>

</html>
