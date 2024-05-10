
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <style>
        table {
            margin-top: 2em;
        }
    </style>
</head>
<body>
    <h1>Users</h1>
    <a href="registration.php">
        <button>Register New User</button>
    </a>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'php/dbconfig.php';
            $stmt = $conn->prepare("SELECT id, first_name, last_name, gender FROM users");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>". $row["first_name"]. " ". $row["last_name"]. "</td>";
                echo "<td>". $row["gender"]. "</td>";
                echo "<td>";
                echo "<a href='php/edit.php?id=". $row["id"]. "'>Edit</a>";
                echo "<a href='php/delete-user.php?id=". $row["id"]. "'>Delete</a>";
                echo "</td>";
            }
            $conn = null; 
           ?>
        </tbody>
    </table>
</body>
</html>