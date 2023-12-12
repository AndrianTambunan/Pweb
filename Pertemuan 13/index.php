<?php
include 'connection.php';

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Student List</title>
</head>

<body>
    <h1>Student List</h1>

    <table>
        <tr>
            <th>NRP</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Picture</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row["nrp"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["gender"] ?></td>
                <td><?= $row["phone"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><img src="image.php?id=<?= $row["id"] ?>" alt="Student Picture" style="width: 50px; height: 50px;"></td>
                <td>
                    <a href="edit.php?id=<?= $row["id"] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row["id"] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="create.php">Add New Student</a>
</body>

</html>
