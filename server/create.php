<html lang="en">
<head>
    <title>Create</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<h1>Create user</h1>
 <a href="index.php">All</a>
 <a href="create.php">Create</a>
 <a href="delete.php">Delete</a>
 <a href="update.php">Update</a>


    <form method="post" action="create.php">
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
        $stmt = $mysqli->prepare("INSERT INTO users (name, surname) VALUES (?, ?)");
        $stmt->bind_param("ss", $_POST["name"], $_POST["surname"]);

        if ($stmt->execute()) {
            echo "<div>OK</div>";
        } else {
            echo "<div>ERR: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }
    ?>
</table>
</body>
</html>