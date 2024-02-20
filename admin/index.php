<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Medico Admin Dashboard</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <img src="assets/images/logo.png" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">


                <li class='sidebar-title'>Main Menu</li>



                <li class="sidebar-item active ">

                    <a href="index.php" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>


                </li>



                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="briefcase" width="20"></i>
                        <span>Data</span>
                    </a>


                    <ul class="submenu ">
                    <li>
                            <a href="obat.php">Data Obat</a>
                        </li>

                        <li>
                            <a href="transaksi_obat.php">Data Transaksi Obat</a>
                        </li>



                    </ul>

                </li>

                <hr />

                <li class="sidebar-item">

<a href="pasien.php" class='sidebar-link'>
    <i data-feather="user-check" width="20"></i>
    <span>Data Pasien</span>
</a>


</li>
<li class="sidebar-item">

<a href="#" class='sidebar-link'>
    <i data-feather="user-check" width="20"></i>
    <span>Data Dokter</span>
</a>


</li>
<li class="sidebar-item">

<a href="#" class='sidebar-link'>
    <i data-feather="user-check" width="20"></i>
    <span>Data Apoteker</span>
</a>


</li>
<li class="sidebar-item">

<a href="pengguna.php" class='sidebar-link'>
    <i data-feather="users" width="20"></i>
    <span>Data Pengguna</span>
</a>


</li>


        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon me-2">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" >
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <span class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $_SESSION['nama']; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../auth/logout.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-6">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>registered patients</h3>

                                <div class="card-right d-flex align-items-center">

                                    <p>
                                        <?php
include '../koneksi.php';
$data1 = mysqli_query($koneksi, "select * from pasien");
$cek1 = mysqli_num_rows($data1);
echo $cek1
?>
                                                </p>
                                    <i data-feather="users" width="50"></i>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>patient today/handled</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p><?php
include '../koneksi.php';
$data2 = mysqli_query($koneksi, "select * from antrian");
$cek2 = mysqli_num_rows($data2);
$data3 = mysqli_query($koneksi, "select * from antrian where status = 1");
$cek3 = mysqli_num_rows($data3);
echo $cek2 . ' / ' . $cek3;
?></p>
                                    <i data-feather="user" width="50"></i>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas2" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Drugs</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p><?php
$data4 = mysqli_query($koneksi, "select * from obat");
$cek4 = mysqli_num_rows($data4);
echo $cek4;
?>
                                                </p>
                                    <i data-feather="thermometer" width="50"></i>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas3" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Earning Today</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p><?php
$jumlah = 0;
$data6 = mysqli_query($koneksi, "SELECT * FROM antrian WHERE status = 1 AND mendaftar = CURRENT_DATE;");
$cek6 = mysqli_num_rows($data6);
$pend1 = $cek6 * 50000;
$data7 = mysqli_query($koneksi, "SELECT obat.harga as a, transaksi_obat.pembelian as b FROM obat, transaksi_obat WHERE transaksi_obat.tanggal = CURRENT_DATE AND obat.id_obat = transaksi_obat.id_obat");
while ($d = mysqli_fetch_array($data7)) {
    $jumlah = $jumlah + ($d['a'] * $d['b']);
}
$pend_akhir = $pend1 + $jumlah;
echo "Rp " . $pend_akhir;

?>
                                        </p>

                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas4" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
    <h3>TOTAL REVENUE</h3>
    <canvas id="myChart"></canvas>
    <script>
        <?php
include '../koneksi.php';
?>
        var ctx = document.getElementById("myChart").getContext('2d');
        <?php
$data8 = mysqli_query($koneksi, "select id_obat,harga from obat");
$cek8 = mysqli_num_rows($data8);
$data9 = mysqli_query($koneksi, "select id_obat,pembelian,tanggal from transaksi_obat");
$cek9 = mysqli_num_rows($data9);
?>
        const dataObat = [
            <?php
while ($d = mysqli_fetch_array($data8)) {
    echo '{ id: ' . $d['id_obat'] . ",harga:" . $d['harga'] . "},";
}
?>
        ];
        const dataTransaksi = [
            <?php
while ($d = mysqli_fetch_array($data9)) {
    echo '{ id: ' . $d['id_obat'] . ", pembelian : " . $d['pembelian'] . ", tanggal : '" . $d['tanggal'] . "'},";
}
?>
        ];
        const sumArr = []
        const dateArr = []
        const sum = dataTransaksi.forEach(e => {
            console.log(dataObat);
            console.log(e);
            const obat = dataObat.find(obat => obat.id === e.id) ?? 5000;
            e.harga = obat.harga;
            e.total = e.pembelian * e.harga;
            sumArr.push(e.total);
            dateArr.push(new Date(e.tanggal).toLocaleDateString());
        })
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dateArr,
                datasets: [{
                    label: '',
                    data: sumArr,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</div>

                <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Medico</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'>Firdan<i data-feather="heart"></i></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <!-- <script src="assets/vendors/apexcharts/apexcharts.min.js"></script> -->
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>

</body>
</html>
