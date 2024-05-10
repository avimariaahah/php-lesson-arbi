<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <?php

    require('dbconfig.php');

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $stmt = $conn->prepare("SELECT id, first_name, last_name, gender FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($id) ||!is_numeric($id)) {
        header("location:../index.php?error=invalid_id");
      
    }

    ?>

    <form action="update-user.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" required>
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" required>
        <br>

        <label for="gender">Gender:</label>
        <div>
            <input type="radio" id="male" name="gender" value="Male" <?php if ($user['gender'] === 'Male') echo 'checked'; ?>>
            <label for="male">Male</label>
        </div>
        <div>
            <input type="radio" id="female" name="gender" value="Female" <?php if ($user['gender'] === 'Female') echo 'checked'; ?>>
            <label for="female">Female</label>
        </div>
        <div>
            <input type="radio" id="other" name="gender" value="Other" <?php if ($user['gender'] === 'Other') echo 'checked'; ?>>
            <label for="other">Other</label>
        </div>
        <br>

        <button type="submit" name="submit">Update User</button>

    </form>

    

   
</body>
</html>
