<?php
require 'database.php';
$db = Database::getInstance()->getPdo();
$products = $db->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head><title>Product List</title></head>
<body>
<h1>Product List</h1>
<a href="create.php">Add New Product</a>
<table border="1">
    <tr>
        <th>Name</th><th>Description</th><th>Price</th><th>Actions</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= htmlspecialchars($product['name']) ?></td>
        <td><?= htmlspecialchars($product['description']) ?></td>
        <td><?= htmlspecialchars($product['price']) ?></td>
        <td>
            <a href="update.php?id=<?= $product['id'] ?>">Update</a>
            <a href="delete.php?id=<?= $product['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>