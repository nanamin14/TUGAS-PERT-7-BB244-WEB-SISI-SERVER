<?php
require_once 'classes/mahasiswa.php';
$mhs = new Mahasiswa(); //objek mahasiswa

if ($_SERVER['REQUEST_METHOD']== 'POST') { 
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nim = $_POST['nim'];

    if ($mhs->update($nim, $nama, $email)) {
        echo '<script> alert("Data berhasil diupdate");window.location="form_user.php"; </script>';
    } else {
        echo '<script> alert("Gagal mengupdate data");window.location="form_user.php"; </script>';
    }
}else {
    echo "Tidak valid.";
}
?>