<?php
require 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM items WHERE id = $id");
$item = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE items SET name = ?, description = ? WHERE id = ?");
    $stmt->bind_param('ssi', $name, $description, $id);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
?>

<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" required>
    <textarea name="description"><?= htmlspecialchars($item['description']) ?></textarea>
    <button type="submit">Update</button>
</form>
