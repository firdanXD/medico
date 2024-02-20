<?php
// Sisipkan file koneksi ke database jika belum dilakukan
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dapatkan data dari form
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];
    
    // Handle upload gambar jika diperlukan
    $foto = '';

    if ($_FILES['foto']['name']) {
        $foto = 'assets/images/' . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    } else {
        // Jika tidak ada file gambar yang diunggah, gunakan foto yang ada dalam database
        $querySelectFoto = "SELECT foto FROM users WHERE id_user = $id_user";
        $resultSelectFoto = mysqli_query($koneksi, $querySelectFoto);

        if ($resultSelectFoto && mysqli_num_rows($resultSelectFoto) > 0) {
            $dataSelectFoto = mysqli_fetch_assoc($resultSelectFoto);
            $foto = $dataSelectFoto['foto'];
        }
    }

    // Periksa apakah password diisi
    if (!empty($_POST['password'])) {
        // Gunakan password baru
        $password = ", password = '" . $_POST['password'] . "'";
    } else {
        // Jika password tidak diisi, tidak perlu memperbarui password
        $password = "";
    }

    // Query SQL untuk menyimpan perubahan data ke dalam database
    $query = "UPDATE users SET username = '$username', nama = '$nama', alamat = '$alamat', role = $role, foto = '$foto'$password WHERE id_user = $id_user";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Data berhasil diperbarui, bisa redirect ke halaman lain atau tampilkan pesan sukses
        header("Location: pengguna.php");
        exit();
    } else {
        // Jika terjadi kesalahan dalam pembaruan data
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}

// Tutup koneksi database jika sudah selesai
mysqli_close($koneksi);
?>
