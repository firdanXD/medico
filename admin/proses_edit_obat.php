<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data yang dikirimkan melalui form
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['nama_obat'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kadaluarsa = $_POST['kadaluarsa'];

    // Query SQL untuk memperbarui data obat
    $query = "UPDATE obat SET
              nama_obat = '$nama_obat',
              harga = '$harga',
              stok = '$stok',
              kadaluarsa = '$kadaluarsa'
              WHERE id_obat = $id_obat";

    if (mysqli_query($koneksi, $query)) {
        // Jika pembaruan berhasil, arahkan kembali ke halaman data obat
        header('Location: obat.php');
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika halaman diakses tanpa melalui metode POST, arahkan kembali ke halaman edit obat
    header('Location: edit_obat.php');
}

mysqli_close($koneksi);
?>
