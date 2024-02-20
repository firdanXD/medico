<?php
// Periksa apakah ada parameter 'id' yang diterima
if (isset($_GET['id'])) {
    $id_pasien = $_GET['id'];

    // Lakukan koneksi ke database
    include '../koneksi.php';

    // Ambil id_user berdasarkan id_pasien
    $query_select_user = "SELECT id_user FROM pasien WHERE id_pasien = $id_pasien";
    $result_select_user = mysqli_query($koneksi, $query_select_user);

    if ($result_select_user) {
        $row = mysqli_fetch_assoc($result_select_user);
        $id_user = $row['id_user'];

        // Hapus data pasien dari tabel pasien
        $query_delete_pasien = "DELETE FROM pasien WHERE id_pasien = $id_pasien";
        $hasil_delete_pasien = mysqli_query($koneksi, $query_delete_pasien);

        // Hapus data user dari tabel users
        $query_delete_user = "DELETE FROM users WHERE id_user = $id_user";
        $hasil_delete_user = mysqli_query($koneksi, $query_delete_user);

        if ($hasil_delete_pasien && $hasil_delete_user) {
            // Jika penghapusan berhasil, alihkan ke halaman data pasien
            header("Location: pasien.php");
        } else {
            // Jika terjadi kesalahan, tampilkan pesan error
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        // Jika terjadi kesalahan dalam mengambil id_user
        echo "Error: " . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
} else {
    // Jika parameter 'id' tidak ditemukan, tampilkan pesan error
    echo "ID pasien tidak ditemukan.";
}
?>
