<?php
require 'database.php';
$db = Database::getInstance()->getPdo();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $db->prepare("UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':description' => $_POST['description'],
        ':price' => $_POST['price'],
        ':id' => $_POST['id']
    ]);
    header("Location: index.php");
    exit;
}

$product = $db->prepare("SELECT * FROM products WHERE id = :id");
$product->execute([':id' => $_GET['id']]);
$product = $product->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head><title>Update Product</title></head>
<body>
<h1>Update Product</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <label>Name: <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required></label><br>
    <label>Description: <input type="text" name="description" value="<?= htmlspecialchars($product['description']) ?>" required></label><br>
    <label>Price: <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']) ?>" required></label><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Back to Product List</a>
</body>
</html>