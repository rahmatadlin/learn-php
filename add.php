<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO items (name, description) VALUES (?, ?)");
    $stmt->bind_param('ss', $name, $description);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Nama" required>
    <textarea name="description" placeholder="Deskripsi"></textarea>
    <button type="submit">Tambah</button>
</form>
