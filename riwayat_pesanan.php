<?php
session_start();
require_once 'config/database.php';
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
$user = $_SESSION['user'];
$stmt = $pdo->prepare('SELECT * FROM pesanan WHERE user_id = ? ORDER BY tanggal_pesanan DESC');
$stmt->execute([$user['id']]);
$pesanan_list = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan Saya - FreshLaundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-tshirt me-2"></i>FreshLaundry
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="layanan.php">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentang.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontak.php">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="riwayat_pesanan.php">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="py-5" style="margin-top: 80px;">
        <div class="container">
            <h2 class="mb-4">Riwayat Pesanan Saya</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No. Pesanan</th>
                            <th>Layanan</th>
                            <th>Berat</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Jadwal Jemput</th>
                            <th>Tanggal Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pesanan_list as $pesanan): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($pesanan['nomor_pesanan']); ?></td>
                            <td><?php echo htmlspecialchars($pesanan['jenis_layanan']); ?></td>
                            <td><?php echo $pesanan['berat']; ?> kg</td>
                            <td>Rp <?php echo number_format($pesanan['total_harga'], 0, ',', '.'); ?></td>
                            <td><span class="status-badge status-<?php echo $pesanan['status']; ?>"><?php echo ucfirst($pesanan['status']); ?></span></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($pesanan['jadwal_jemput'])); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($pesanan['tanggal_pesanan'])); ?></td>
                            <td>
                                <?php if($pesanan['status'] === 'pending'): ?>
                                    <a href="edit_pesanan.php?id=<?php echo $pesanan['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="hapus_pesanan.php?id=<?php echo $pesanan['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus pesanan ini?')"><i class="fas fa-trash"></i></a>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-tshirt me-2"></i>FreshLaundry</h5>
                    <p class="mb-0">Layanan laundry online terpercaya untuk kenyamanan Anda.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        <i class="fas fa-phone me-2"></i>+62 812-3456-7890<br>
                        <i class="fas fa-envelope me-2"></i>info@freshlaundry.com
                    </p>
                </div>
            </div>
            <hr class="my-3">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 FreshLaundry. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html> 