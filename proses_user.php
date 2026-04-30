<?php
require_once 'config/database.php';
require_once 'classes/mahasiswa.php';

$database = new Database();
$db = $database->getConnection();

$mhs = new Mahasiswa($db); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mhs->nim = $_POST['nim'];
    $mhs->nama = $_POST['nama'];
    $mhs->jurusan = $_POST['jurusan'];
    $mhs->alamat = $_POST['alamat'];
    $mhs->email = $_POST['email'];
    $mhs->no_hp = $_POST['no_hp'];

    if ($mhs->create()) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    } else {
        echo "Gagal menyimpan data.";
    }
} else {
    echo "Akses tidak valid.";
}
?>
