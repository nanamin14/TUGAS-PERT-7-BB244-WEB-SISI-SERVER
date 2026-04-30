<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2> Edit Mahasiswa </h2>
    <?php
        require_once 'config/database.php';
        require_once 'classes/mahasiswa.php';

        $database = new Database();
        $db = $database->getConnection();

        $mhs = new Mahasiswa($db);

        $data = $mhs->readByID($_GET['nim']);
    ?>

    <form action="proses_user_update.php" method="POST">
        <input type="hidden" name="nim" value="<?= $data['nim']; ?>"> 

        <label> Nama : </label> <br>
        <input type="text" name="nama" value="<?= $data['nama']; ?>" required> <br><br>

        <label> Email : </label> <br>
        <input type="email" name="email" value="<?= $data['email']; ?>" required> <br><br>

        <label> Jurusan : </label> <br>
        <input type="text" name="jurusan" value="<?= $data['jurusan']; ?>" required> <br><br>

        <input type="submit" value="Update Data">
        <a href="index.php">Batal</a>
    </form>
</body>
</html>