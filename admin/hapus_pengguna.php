<?php
// Sisipkan file koneksi ke database jika belum dilakukan
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    // Lakukan koneksi ke database
    include '../koneksi.php';

    // Ambil id_pasien berdasarkan id_user
    $query_select_pasien = "SELECT id_pasien FROM pasien WHERE id_user = $id_user";
    $result_select_pasien = mysqli_query($koneksi, $query_select_pasien);

    if ($result_select_pasien) {
        $row = mysqli_fetch_assoc($result_select_pasien);
        $id_pasien = $row['id_pasien'];

        // Hapus data pasien dari tabel pasien
        $query_delete_pasien = "DELETE FROM pasien WHERE id_pasien = $id_pasien";
        $hasil_delete_pasien = mysqli_query($koneksi, $query_delete_pasien);

        // Hapus data user dari tabel users
        $query_delete_user = "DELETE FROM users WHERE id_user = $id_user";
        $hasil_delete_user = mysqli_query($koneksi, $query_delete_user);

        if ($hasil_delete_pasien && $hasil_delete_user) {
            // Jika penghapusan berhasil, alihkan ke halaman data pengguna
            header("Location: pengguna.php");
            exit();
        } else {
            // Jika terjadi kesalahan dalam penghapusan data
            header("Location: pengguna.php");
        }
    } else {
        // Jika terjadi kesalahan dalam mengambil id_pasien
        header("Location: pengguna.php");
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
} else {
    // Jika parameter 'id' tidak ditemukan, tampilkan pesan error
    echo "ID pengguna tidak ditemukan.";
}
?>
