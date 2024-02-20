<?php
    session_start();
    include "../koneksi.php";

    $namaObat = $_POST['nama_obat'];
    $hargaObat = $_POST['harga'];
    $stok = $_POST['stok'];
    $kadaluarsa = $_POST['kadaluarsa'];

    $query = "INSERT INTO `obat`(`id_obat`, `nama_obat`, `harga`, `stok`, `kadaluarsa`) VALUES ('','$namaObat','$hargaObat','$stok','$kadaluarsa')";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        header("location:obat.php?pesan=success");
    }else{
        header("location:tmbh_obat.php?pesan=gagal");
    }

?>