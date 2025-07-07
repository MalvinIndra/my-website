<?php
session_start();
require_once '../config/database.php';

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$where_clause = $status_filter ? "WHERE status = ?" : "";

$stmt = $pdo->prepare("SELECT * FROM pesanan $where_clause ORDER BY tanggal_pesanan DESC");
if($status_filter) {
    $stmt->execute([$status_filter]);
} else {
    $stmt->execute();
}
$pesanan_list = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - Admin FreshLaundry</title>
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
                            <a class="nav-link" href="dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="pesanan.php">
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
                    <h1 class="h2">Kelola Pesanan</h1>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <form method="GET" class="d-flex">
                            <select name="status" class="form-select me-2">
                                <option value="">Semua Status</option>
                                <option value="pending" <?php echo $status_filter === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="processing" <?php echo $status_filter === 'processing' ? 'selected' : ''; ?>>Processing</option>
                                <option value="completed" <?php echo $status_filter === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                <option value="cancelled" <?php echo $status_filter === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Layanan</th>
                                <th>Berat</th>
                                <th>Total</th>
                                <th>Jadwal Jemput</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pesanan_list as $pesanan): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($pesanan['nomor_pesanan']); ?></td>
                                <td><?php echo htmlspecialchars($pesanan['nama']); ?></td>
                                <td><?php echo htmlspecialchars($pesanan['telepon']); ?></td>
                                <td><?php echo htmlspecialchars($pesanan['jenis_layanan']); ?></td>
                                <td><?php echo $pesanan['berat']; ?> kg</td>
                                <td>Rp <?php echo number_format($pesanan['total_harga'], 0, ',', '.'); ?></td>
                                <td><?php echo date('d/m/Y H:i', strtotime($pesanan['jadwal_jemput'])); ?></td>
                                <td>
                                    <span class="status-badge status-<?php echo $pesanan['status']; ?>">
                                        <?php echo ucfirst($pesanan['status']); ?>
                                    </span>
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($pesanan['tanggal_pesanan'])); ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="detail_pesanan.php?id=<?php echo $pesanan['id']; ?>" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $pesanan['id']; ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Update Status -->
                            <div class="modal fade" id="updateModal<?php echo $pesanan['id']; ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Status Pesanan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="update_status.php" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="pesanan_id" value="<?php echo $pesanan['id']; ?>">
                                                <div class="mb-3">
                                                    <label class="form-label">Status:</label>
                                                    <select name="status" class="form-select" required>
                                                        <option value="pending" <?php echo $pesanan['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                        <option value="processing" <?php echo $pesanan['status'] === 'processing' ? 'selected' : ''; ?>>Processing</option>
                                                        <option value="completed" <?php echo $pesanan['status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                                        <option value="cancelled" <?php echo $pesanan['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Update Status</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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