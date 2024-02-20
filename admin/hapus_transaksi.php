<?php
// Include file koneksi ke database
include '../koneksi.php';

// Pastikan parameter 'id' telah diterima dari URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_transaksi = $_GET['id'];

    // Hapus data transaksi berdasarkan ID
    $query = "DELETE FROM transaksi_obat WHERE id_transaksi = $id_transaksi";

    if (mysqli_query($koneksi, $query)) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman data transaksi
        header("Location: transaksi_obat.php");
    } else {
        // Jika terjadi kesalahan saat menghapus data, tampilkan pesan kesalahan
        echo "Gagal menghapus data transaksi. " . mysqli_error($koneksi);
    }
} else {
    // Jika parameter 'id' tidak ditemukan, arahkan kembali ke halaman data transaksi
    header("Location: transaksi_obat.php");
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
