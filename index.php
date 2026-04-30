<?php
include_once 'config/database.php';
include_once 'classes/mahasiswa.php';

$database = new Database();
$db = $database->getConnection();
$mhs = new Mahasiswa($db);

$stmt = $mhs->read(); // Mengambil data untuk ditampilkan di tabel
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Mahasiswa</title>
    <style>
        /* Gaya font dan layout agar mirip dengan gambar */
        body { font-family: "Times New Roman", Times, serif; margin: 30px; }
        h2 { margin-bottom: 15px; font-size: 24px; }
        
        /* Container Form */
        .form-container { width: 300px; margin-bottom: 40px; }
        .form-group { margin-bottom: 8px; }
        .form-group label { display: block; margin-bottom: 2px; }
        .form-group input { width: 100%; padding: 3px; border: 1px solid #767676; }
        
        button { margin-top: 10px; cursor: pointer; padding: 2px 10px; }

        /* Gaya Tabel Hitam Putih Solid[cite: 3] */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; border: 1px solid black; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #fff; }
        
        .action-links a { color: blue; text-decoration: underline; font-size: 14px; }
        hr { border: 0; border-top: 1px solid #ccc; margin: 30px 0; }
    </style>
</head>
<body>

    <h2>Input Mahasiswa</h2>
    <div class="form-container">
        <!-- Form mengirim data ke proses_user.php[cite: 1, 3] -->
        <form action="proses_user.php" method="POST">
            <div class="form-group">
                <label>NIM :</label>
                <input type="text" name="nim" required>
            </div>
            <div class="form-group">
                <label>Nama :</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>Jurusan :</label>
                <input type="text" name="jurusan" required>
            </div>
            <div class="form-group">
                <label>Alamat :</label>
                <input type="text" name="alamat" required>
            </div>
            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>No. HP :</label>
                <input type="text" name="no_hp" required>
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>

    <hr>

    <h2>Data Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jurusan'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['no_hp'] ?></td>
                <td class="action-links">
                    <!-- Link ke file edit dan delete sesuai daftar file di .zip[cite: 3] -->
                    <a href="editUser.php?nim=<?= $row['nim'] ?>">Edit</a> | 
                    <a href="deleteUser.php?nim=<?= $row['nim'] ?>" onclick="return confirm('Yakin hapus?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>