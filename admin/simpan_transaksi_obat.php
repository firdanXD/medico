<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $id_pasien = $_POST['id_pasien'];
    $id_petugas = $_POST['id_petugas'];
    $tanggal = $_POST['tanggal'];
    $id_obat = $_POST['id_obat'];
    $pembelian = $_POST['pembelian'];

    // You can add validation and error handling here if needed

    // Insert the new transaction into the database
    $query = "INSERT INTO transaksi_obat (id_pasien, id_petugas, tanggal, id_obat, pembelian) VALUES ('$id_pasien', '$id_petugas', '$tanggal', '$id_obat', '$pembelian')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect to the data transaksi obat page or display a success message
        header("Location: transaksi_obat.php");
        exit();
    } else {
        // Handle the error if the insertion fails
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
