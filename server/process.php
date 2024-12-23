<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($name) && !empty($message)) {
        $sql = "INSERT INTO guestbook (name, message) VALUES ('$name', '$message')";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Nama dan pesan harus diisi.";
    }
}
?>
