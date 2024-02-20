<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from users where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
while($d = mysqli_fetch_array($login)){$ids = $d['id_user']; $role = $d['role']; $nama = $d['nama'];
    }
// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $_SESSION['ids'] = $ids;
    $_SESSION['nama'] = $nama;
    $_SESSION['status'] = $role;

    if($role == 1){
        header("location:admin/index.php?pesan=success");
    }else if($role ==2){
        header("location:dokter/index.php?pesan=success");
    }else if($role ==3){
        header("location:apoteker/index.php?pesan=success");
    }else if($role ==4){
        header("location:pasien/index.php?pesan=success");
    }

} else {
    header("location:auth/auth.php?pesan=gagal");
}
