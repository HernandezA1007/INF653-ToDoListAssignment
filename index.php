<?php
// Antonio Hernandez
// INF 653
// ToDo List Application
// 2 - 22 - 23
?>

<?php 
    require_once "database.php";
    $stmt = $pdo->prepare("SELECT * FROM todoitems");
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ToDo List</title>
</head>

<body>
    <div class="container">
        <h1>ToDo List</h1>
        <div class="task-list">
        <?php if (count($items) > 0): ?>
            <?php foreach ($items as $item): ?>
                <div class="task-list-item">
                    <div class="task-list-item-title">
                        <?php echo htmlspecialchars($item["item"]); ?>
                    </div>
                    <div class="task-list-item-description">
                        <?php echo htmlspecialchars($item["description"]); ?>
                    </div>
                        <form method="post" action="delete.php" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $item["ItemNum"]; ?>">
                            <button type="submit">Remove</button>
                        </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nothing exists yet.</p>
        <?php endif; ?>
        </div>
        <a href="add.php" class="add-item-button">Add item</a>
    </div>
</body>
</html>