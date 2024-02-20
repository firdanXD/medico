<?php
session_start();
include "koneksi.php"; // Assuming this file contains your database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $address = $_POST['alamat'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Add server-side validation here if needed

    if ($password ) {
        // Insert user data into the "users" table
        $query = "INSERT INTO users (username, password, nama, alamat, role) VALUES ('$username', '$password', '$name', '$address', '$role')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // If the selected role is "Pasien," insert into the "pasien" table
            if ($role == 4) {
                $bpjsClass = $_POST['bpjs'];
                $userId = mysqli_insert_id($koneksi);
                $queryPasien = "INSERT INTO pasien (id_user, bpjs) VALUES ('$userId', '$bpjsClass')";
                mysqli_query($koneksi, $queryPasien);
            }

            header("location:auth/auth.php?pesan=success");
        } else {
            header("location:auth/auth.php?pesan=gagal");
        }
    } else {
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Password Mismatch",
                text: "Password and repeat password do not match.",
            }).then(function() {
                window.location.href = "#";
            });
        </script>';
    }
} else {
    // Handle GET requests or direct access to this file
    header("location:auth/auth.php?pesan=gagal"); // Redirect to the registration page
}
?>
