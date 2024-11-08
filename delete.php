<?php
if (isset($_GET['id'])) {
    require 'database.php';
    $db = Database::getInstance()->getPdo();
    $stmt = $db->prepare("DELETE FROM products WHERE id = :id");
    $stmt->execute([':id' => $_GET['id']]);
}
header("Location: index.php");
exit;
?>