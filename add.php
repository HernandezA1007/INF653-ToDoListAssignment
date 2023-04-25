<?php
    require_once "database.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $item = $_POST["item"];
        $description = $_POST["description"];

        $stmt = $pdo->prepare("INSERT INTO todoitems (item, description) VALUES (:item, :description)");
        $stmt->execute(["item" => $item, "description" => $description]);

        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Item</title>
</head>

<body>
    <h1>Add Item</h1>
    <form method="post">
        <label for="item">Item:</label>
        <input type="text" name="item" id="item" required maxlength="20">
        <br>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required maxlength="50">
        <br>
        <button type="submit">Add Item</button>
    </form>
    <a href="index.php">Back to list</a>
</body>
</html>