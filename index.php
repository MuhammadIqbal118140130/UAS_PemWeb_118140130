<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/scripts.js"></script>
</head>
<body>
    <div class="container">
        <h1>Buku Tamu Pernikahan</h1>
        <form id="guestForm" action="server/process.php" method="POST">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama"><br><br>

            <label for="message">Pesan:</label>
            <textarea id="message" name="message" placeholder="Tulis pesan Anda"></textarea><br><br>

            <button type="submit">Kirim</button>
        </form>

        <h2>Daftar Tamu</h2>
        <table id="guestTable">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Pesan</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Hubungkan ke database
                include 'server/config.php';

                // Query untuk mengambil data
                $result = $conn->query("SELECT * FROM guestbook ORDER BY created_at DESC");

                // Tampilkan data jika ada
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>" . htmlspecialchars($row['message']) . "</td>
                                <td>" . htmlspecialchars($row['created_at']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Belum ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

     <!-- Footer -->
     <footer class="footer">
        <p>Created by Muhammad Iqbal - 118140130</p>
    </footer>
</body>
</html>
