<?php include 'navbar.php'; ?>

<?php
$conn = new mysqli('localhost', 'root', '', 'multi_shop_stock');

$id = $_GET['id'];
$table = $_GET['table'];

$conn->query("DELETE FROM `$table` WHERE id = $id");

header("Location: stock.php?table=$table");
?>