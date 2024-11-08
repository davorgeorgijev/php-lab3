<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require 'database.php';
    $db = Database::getInstance()->getPdo();
    $stmt = $db->prepare("INSERT INTO products (name, description, price) VALUES (:name, :description, :price)");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':description' => $_POST['description'],
        ':price' => $_POST['price']
    ]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Product</title></head>
<body>
<h1>Add New Product</h1>
<form method="post">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Description: <input type="text" name="description" required></label><br>
    <label>Price: <input type="number" step="0.01" name="price" required></label><br>
    <button type="submit">Save</button>
</form>
<a href="index.php">Back to Product List</a>
</body>
</html>