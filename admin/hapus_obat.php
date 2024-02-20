<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id_obat = $_GET['id'];

    // Query SQL untuk menghapus data obat berdasarkan ID obat
    $query = "DELETE FROM obat WHERE id_obat = $id_obat";

    if (mysqli_query($koneksi, $query)) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman data obat
        header('Location: obat.php');
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika ID obat tidak valid, arahkan kembali ke halaman data obat
    header('Location: obat.php');
}

mysqli_close($koneksi);
?>
