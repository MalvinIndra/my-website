<?php
session_start();
require_once '../config/database.php';

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

$stmt = $pdo->query("SELECT * FROM pesanan ORDER BY tanggal_pesanan DESC");
$pesanan_list = $stmt->fetchAll();

$stmt = $pdo->query("SELECT COUNT(*) as total FROM pesanan WHERE status = 'pending'");
$pending_count = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM pesanan WHERE status = 'processing'");
$processing_count = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM pesanan WHERE status = 'completed'");
$completed_count = $stmt->fetch()['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - FreshLaundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="../index.php">
                <i class="fas fa-tshirt me-2"></i>FreshLaundry Admin
            </a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">
                    <i class="fas fa-user me-2"></i><?php echo htmlspecialchars($_SESSION['user']['nama']); ?>
                </span>
                <a class="nav-link" href="../logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid" style="margin-top: 80px;">
        <div class="row">
            <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pesanan.php">
                                <i class="fas fa-list me-2"></i>Pesanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users.php">
                                <i class="fas fa-users me-2"></i>Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pesan.php">
                                <i class="fas fa-envelope me-2"></i>Pesan Kontak
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Admin</h1>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="card-title">Pending</h5>
                                        <h2><?php echo $pending_count; ?></h2>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-clock fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="card-title">Processing</h5>
                                        <h2><?php echo $processing_count; ?></h2>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-cogs fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="card-title">Completed</h5>
                                        <h2><?php echo $completed_count; ?></h2>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-check-circle fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Pesanan Terbaru</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Nama</th>
                                <th>Layanan</th>
                                <th>Berat</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(array_slice($pesanan_list, 0, 10) as $pesanan): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($pesanan['nomor_pesanan']); ?></td>
                                <td><?php echo htmlspecialchars($pesanan['nama']); ?></td>
                                <td><?php echo htmlspecialchars($pesanan['jenis_layanan']); ?></td>
                                <td><?php echo $pesanan['berat']; ?> kg</td>
                                <td>Rp <?php echo number_format($pesanan['total_harga'], 0, ',', '.'); ?></td>
                                <td>
                                    <span class="status-badge status-<?php echo $pesanan['status']; ?>">
                                        <?php echo ucfirst($pesanan['status']); ?>
                                    </span>
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($pesanan['tanggal_pesanan'])); ?></td>
                                <td>
                                    <a href="detail_pesanan.php?id=<?php echo $pesanan['id']; ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 