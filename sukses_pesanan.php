<?php
session_start();

if (!isset($_SESSION['pesanan_sukses'])) {
    header('Location: index.php');
    exit();
}

$pesanan = $_SESSION['pesanan_sukses'];
unset($_SESSION['pesanan_sukses']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - FreshLaundry</title>
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
                </ul>
            </div>
        </div>
    </nav>

    <section class="py-5" style="margin-top: 80px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body p-5">
                            <div class="mb-4">
                                <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                            </div>
                            <h2 class="card-title text-success mb-4">Pesanan Berhasil!</h2>
                            <p class="lead mb-4">Terima kasih telah mempercayai FreshLaundry. Pesanan Anda telah kami terima dan akan segera kami proses.</p>
                            
                            <div class="alert alert-info">
                                <h5 class="alert-heading">Detail Pesanan:</h5>
                                <div class="row text-start">
                                    <div class="col-md-6">
                                        <p><strong>Nomor Pesanan:</strong><br><?php echo $pesanan['nomor_pesanan']; ?></p>
                                        <p><strong>Nama:</strong><br><?php echo htmlspecialchars($pesanan['nama']); ?></p>
                                        <p><strong>Jenis Layanan:</strong><br>
                                            <?php 
                                            $layanan_names = [
                                                'cuci_kering' => 'Cuci Kering',
                                                'cuci_setrika' => 'Cuci + Setrika',
                                                'setrika_saja' => 'Setrika Saja',
                                                'dry_clean' => 'Dry Clean',
                                                'premium' => 'Premium Care'
                                            ];
                                            echo $layanan_names[$pesanan['jenis_layanan']];
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Berat:</strong><br><?php echo $pesanan['berat']; ?> kg</p>
                                        <p><strong>Total Harga:</strong><br>Rp <?php echo number_format($pesanan['total_harga'], 0, ',', '.'); ?></p>
                                        <p><strong>Jadwal Penjemputan:</strong><br><?php echo date('d/m/Y H:i', strtotime($pesanan['jadwal_jemput'])); ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="alert alert-warning">
                                <h6><i class="fas fa-info-circle me-2"></i>Informasi Penting:</h6>
                                <ul class="mb-0 text-start">
                                    <li>Simpan nomor pesanan Anda untuk tracking</li>
                                    <li>Tim kami akan menghubungi Anda untuk konfirmasi</li>
                                    <li>Pastikan nomor telepon aktif untuk koordinasi</li>
                                    <li>Pesanan akan dijemput sesuai jadwal yang telah ditentukan</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex gap-3 justify-content-center">
                                <a href="index.php" class="btn btn-primary">
                                    <i class="fas fa-home me-2"></i>Kembali ke Beranda
                                </a>
                                <button onclick="window.print()" class="btn btn-outline-primary">
                                    <i class="fas fa-print me-2"></i>Cetak Bukti
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
</body>
</html> 