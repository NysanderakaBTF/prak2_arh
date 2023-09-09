<html lang="en">
<head>
    <title>Delete</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<a href="index.php">All</a>
<a href="create.php">Create</a>
<a href="delete.php">Delete</a>
<a href="update.php">Update</a>
<h1>Delete user</h1>

<form method="post" action="delete.php">
    <input type="number" name="id"
           placeholder="Enter id">
    <input type="submit" name="submit-btn"
           value="submit">
</form>

    <?php
    $mysqli = new mysqli("db", "user", "password", "appDB");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if (isset($_POST["submit-btn"])) {
        $id = $_POST["id"];
        $stm = $mysqli->prepare("DELETE FROM users WHERE ID = ?");

        if ($stm === false) {
            die("Prepare failed: " . $mysqli->error);
        }

        $stm->bind_param("i", $id);

        if ($stm->execute()) {
            echo "<div>OK</div>";
        } else {
            echo "<div>ERR: " . $stm->error . "</div>";
        }

        $stm->close();
    }

    $mysqli->close();
    ?>



</body>
</html>