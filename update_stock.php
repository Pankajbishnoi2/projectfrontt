  
  
  <?php
$conn = new mysqli('localhost', 'root', '', 'multi_shop_stock');

$table = $_GET['table'];
$id = $_GET['id'];?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update - <?php  echo htmlspecialchars($table)?></title>
</head>
<body>
    
<?php include 'navbar.php'; ?>
    
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    
    $conn->query("UPDATE `$table` SET item_name = '$item_name', quantity = $quantity WHERE id = $id");
    header("Location: stock.php?table=$table");
    exit;
}

$result = $conn->query("SELECT * FROM `$table` WHERE id = $id");
$row = $result->fetch_assoc();
?>



<h2>Edit Item (<?= $table ?>)</h2>
<form method="POST">
    <input type="text" name="item_name" value="<?= $row['item_name'] ?>" required>
    <input type="number" name="quantity" value="<?= $row['quantity'] ?>" required>
    <button type="submit">Update</button>
</form>

</body>
</html>