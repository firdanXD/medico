<?php
session_start();
?>
<?php
        // Sisipkan file koneksi ke database jika belum dilakukan
        include '../koneksi.php';

        // Cek apakah ada parameter ID yang dikirimkan melalui URL  
        if (isset($_GET['id'])) {
            $id_user = $_GET['id'];

            // Query SQL untuk mengambil data pengguna berdasarkan ID
            $query = "SELECT * FROM users WHERE id_user = $id_user";
            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_assoc($result);
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">.
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengguna</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="icon" href="favicon.png" type="image/x-icon">
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
                            <a href="pasien.php">Data Pasien</a>
                        </li>
                        
                        
                        <li>
                            <a href="pengguna.php">Data Pengguna</a>
                        </li>
                        
                        
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

<a href="#" class='sidebar-link'>
    <i data-feather="user-check" width="20"></i>
    <span>Data Pasien</span>
</a>


</li>
<li class="sidebar-item">

<a href="#" class='sidebar-link'>
    <i data-feather="user-check" width="20"></i>
    <span>Data Apoteker</span>
</a>


</li>
<li class="sidebar-item">

<a href="#" class='sidebar-link'>
    <i data-feather="user-check" width="20"></i>
    <span>Data Dokter</span>
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
            <div class="container">
        <h1>Edit Data Pengguna</h1>
        <form action="proses_edit_pengguna.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $data['password']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="1" <?php echo ($data['role'] == 1) ? 'selected' : ''; ?>>Admin</option>
                            <option value="2" <?php echo ($data['role'] == 2) ? 'selected' : ''; ?>>Apoteker</option>
                            <option value="4" <?php echo ($data['role'] == 3) ? 'selected' : ''; ?>>Dokter</option>
                            <option value="4" <?php echo ($data['role'] == 4) ? 'selected' : ''; ?>>Pasien</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        <img src="<?php echo $data['foto']; ?>" width="50" alt="Foto Sebelumnya">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
        <?php
            } else {
                echo "Data pengguna tidak ditemukan.";
            }
        } else {
            echo "ID pengguna tidak ditemukan dalam parameter URL.";
        }
        // Tutup koneksi database jika sudah selesai
        mysqli_close($koneksi);
        ?>
    </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Medico</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>
</html>


