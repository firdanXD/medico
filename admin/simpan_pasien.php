<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $bpjs = $_POST['bpjs'];
    $username = $_POST['username']; // Tambahkan baris ini untuk mengambil username
    $password = $_POST['password']; // Tambahkan baris ini untuk mengambil password

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $path = "assets/images";

    $role = $_POST['role'];


    if (move_uploaded_file($tmp, $path . $foto)) {
        $query1 = "INSERT INTO users (nama, alamat, foto, username, password, role) VALUES ('$nama', '$alamat', '$foto', '$username', '$password','$role')";
        // Sisipkan password ke dalam database dalam bentuk yang aman (misalnya, dengan hashing)

        $result1 = mysqli_query($koneksi, $query1);

        if ($result1) {
            $id_user = mysqli_insert_id($koneksi);
            $query2 = "INSERT INTO pasien (id_user, bpjs) VALUES ($id_user, '$bpjs')";
            $result2 = mysqli_query($koneksi, $query2);

            if ($result2) {
                header("Location: pasien.php");
            } else {
                echo "Gagal menyimpan data di tabel pasien: " . mysqli_error($koneksi);
            }
        } else {
            echo "Gagal menyimpan data di tabel users: " . mysqli_error($koneksi);
        }
    }

    mysqli_close($koneksi);
}
