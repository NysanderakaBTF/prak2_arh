<html lang="en">
<head>
    <title>Create</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<a href="index.php">All</a>
<a href="create.php">Create</a>
<a href="delete.php">Delete</a>
<a href="update.php">Update</a>
<h1>Uodate user</h1>

<form method="post" action="update.php">
    <input type="text" name="id"
           placeholder="Enter id">
    <input type="text" name="name"
           placeholder="Enter name">
    <input type="text" name="surname"
           placeholder="Enter surname">
    <input type="submit" name="submit-btn"
           value="submit">
</form>
<table>
    <?php
    $mysqli = new mysqli("db", "user", "password", "appDB");






    if (isset($_POST["submit-btn"])) {
        // Update query
        $stmt = $mysqli->prepare("UPDATE users SET name = ?, surname = ? WHERE id = ?");

        $stmt->bind_param("ssi", $_POST["name"], $_POST["surname"], $_POST["id"]);

        if ($stmt->execute()) {
            echo "<div>Update successful</div>";

            // Select query to display updated rows
            $selectStmt = $mysqli->query("SELECT * FROM users WHERE id = " . $_POST["id"]);

            while ($row = $selectStmt->fetch_assoc()) {
                echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['surname']}</td></tr>";
            }
        } else {
            echo "<div>Update failed: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }


    ?>
</table>
</body>
</html>