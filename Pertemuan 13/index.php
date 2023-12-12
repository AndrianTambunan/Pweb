<?php
include 'connection.php';

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Student List</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Student List</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>NRP</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row["nrp"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["gender"] ?></td>
                        <td><?= $row["phone"] ?></td>
                        <td><?= $row["address"] ?></td>
                        <td><img src="image.php?id=<?= $row["id"] ?>" alt="Student Picture" style="width: 50px; height: 50px;"></td>
                        <td>
                            <a href="edit.php?id=<?= $row["id"] ?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?= $row["id"] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="create.php" class="btn btn-success">Add New Student</a>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
