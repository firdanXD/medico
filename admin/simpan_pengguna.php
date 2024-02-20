<?php
// Sisipkan file koneksi ke database jika belum dilakukan
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // Hash password untuk keamanan
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];
    
    // Handle upload gambar jika diperlukan
    $foto = '';
    if ($_FILES['foto']['name']) {
        $foto = 'assets/images' . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }

    // Query SQL untuk menyimpan data ke dalam database
    $query = "INSERT INTO users (username, password, nama, alamat, role, foto) VALUES ('$username', '$password', '$nama', '$alamat', '$role', '$foto')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Data berhasil disimpan, bisa redirect ke halaman lain atau tampilkan pesan sukses
        header("Location: pengguna.php");
        exit();
    } else {
        // Jika terjadi kesalahan dalam penyimpanan data
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}

// Tutup koneksi database jika sudah selesai
mysqli_close($koneksi);
?>
