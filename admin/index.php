<?php
session_start();
include 'db.php';

// Cek login
if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Silakan login terlebih dahulu!');
        window.location.href='login.php';
    </script>";
    exit;
}

// Batas data per halaman
$batas = 3;

// User
$halaman_user = isset($_GET['halaman_user']) ? (int)$_GET['halaman_user'] : 1;
$mulai_user = ($halaman_user > 1) ? ($halaman_user * $batas) - $batas : 0;

$user_sql = "SELECT * FROM admin LIMIT $mulai_user, $batas";
$user_result = $conn->query($user_sql);

$user_count = $conn->query("SELECT * FROM admin")->num_rows;
$total_halaman_user = ceil($user_count / $batas);


// Router
$halaman_router = isset($_GET['halaman_router']) ? (int)$_GET['halaman_router'] : 1;
$mulai_router = ($halaman_router > 1) ? ($halaman_router * $batas) - $batas : 0;

$router_sql = "SELECT * FROM router LIMIT $mulai_router, $batas";
$router_result = $conn->query($router_sql);

$router_count = $conn->query("SELECT * FROM router")->num_rows;
$total_halaman_router = ceil($router_count / $batas);
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Jaringan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <h3>UM Bima</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link text-white">Dashboard Admin</a></li>
                <li class="nav-item"><a href="add_user.php" class="nav-link text-white">Add User</a></li>
                <li class="nav-item"><a href="add_router.php" class="nav-link text-white">Add Router</a></li>
                <li class="nav-item"><a href="log_activity.php" class="nav-link text-white">Log Activity</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
            </ul>
        </nav>

<!-- Main Content -->
<div class="p-4" style="flex: 1;">
    <h1>Dashboard Admin Monitoring Jaringan</h1>

    <!-- Tabel User -->
<h3 class="mt-4">Data User</h3>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = $mulai_user + 1;
            while ($user = $user_result->fetch_assoc()) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$user['nama']}</td>
                        <td>{$user['username']}</td>
                        <td>{$user['email']}</td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Pagination User -->
<nav>
  <ul class="pagination">
    <?php for($x=1; $x<=$total_halaman_user; $x++): ?>
      <li class="page-item <?= ($x == $halaman_user) ? 'active' : '' ?>">
        <a class="page-link" href="?halaman_user=<?=$x?>#user"> <?= $x; ?> </a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>


    <!-- Tabel Router -->
<h3 class="mt-5">Data Router</h3>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Router</th>
                <th>IP Address</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = $mulai_router + 1;
            while ($router = $router_result->fetch_assoc()) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$router['nama_router']}</td>
                        <td>{$router['ip']}</td>
                        <td>{$router['lokasi']}</td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Pagination Router -->
<nav>
  <ul class="pagination">
    <?php for($x=1; $x<=$total_halaman_router; $x++): ?>
      <li class="page-item <?= ($x == $halaman_router) ? 'active' : '' ?>">
        <a class="page-link" href="?halaman_router=<?=$x?>#router"> <?= $x; ?> </a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>


</body>
</html>