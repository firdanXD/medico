<?php
include '../koneksi.php';

if (isset($_POST['update_pasien'])) {
    $id_pasien = $_POST['id_pasien'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $bpjs = $_POST['bpjs'];

    // Update user table
    $update_user = mysqli_query($koneksi, "UPDATE users SET nama='$nama', alamat='$alamat' WHERE id_user IN (SELECT id_user FROM pasien WHERE id_pasien = $id_pasien)");

    // Update pasien table
    $update_pasien = mysqli_query($koneksi, "UPDATE pasien SET bpjs='$bpjs' WHERE id_pasien = $id_pasien");

    if ($update_user && $update_pasien) {
        echo "Data pasien berhasil diupdate.";
    } else {
        echo "Gagal mengupdate data pasien.";
    }
} else {
    echo "Invalid request.";
}
?>
