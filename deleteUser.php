<?php
include_once 'config/database.php';
include_once 'classes/mahasiswa.php';

$database = new Database();
$db = $database->getConnection();
$mhs = new Mahasiswa($db);

if (isset($_GET['nim'])) {
    $nim_yang_dipilih = $_GET['nim'];

    if ($mhs->delete($nim_yang_dipilih)) {
        header("Location: index.php?pesan=berhasil_hapus");
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    header("Location: index.php");
}
?>