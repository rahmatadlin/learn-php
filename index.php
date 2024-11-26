<?php
session_start();
require 'db.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$result = $conn->query("SELECT * FROM items");
?>

<a href="add.php">Tambah Item</a>
<a href="logout.php">Logout</a>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
