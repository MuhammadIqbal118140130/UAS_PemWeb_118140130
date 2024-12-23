<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Validasi ID sebagai integer

    $stmt = $conn->prepare("DELETE FROM guestbook WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "success"; // Kirim status berhasil
    } else {
        echo "error"; // Kirim status gagal
    }
    $stmt->close();
}

$conn->close();
?>
