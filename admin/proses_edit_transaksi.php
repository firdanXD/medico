<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data yang dikirimkan melalui form
    $id_transaksi = $_POST['id_transaksi'];
    $id_pasien = $_POST['id_pasien'];
    $id_petugas = $_POST['id_petugas'];
    $tanggal = $_POST['tanggal'];
    $id_obat = $_POST['id_obat'];
    $pembelian = $_POST['pembelian'];

    // Query SQL untuk memperbarui data obat
    $query = "UPDATE `transaksi_obat` SET `id_pasien`='$id_pasien',`id_petugas`='$id_petugas',`tanggal`='$tanggal',`id_obat`='$id_obat',`pembelian`='$pembelian' WHERE id_transaksi = $id_transaksi";

    if (mysqli_query($koneksi, $query)) {
        // Jika pembaruan berhasil, arahkan kembali ke halaman data obat
        header('Location: transaksi_obat.php');
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika halaman diakses tanpa melalui metode POST, arahkan kembali ke halaman edit obat
    header('Location: edit_transaksi_obat.php');
}

mysqli_close($koneksi);
?>