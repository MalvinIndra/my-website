<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshLaundry - Layanan Laundry Online Terpercaya</title>
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
                        <a class="nav-link active" href="index.php">Beranda</a>
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
                    <?php if(isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold text-white mb-4">
                        Laundry Online Terpercaya
                    </h1>
                    <p class="lead text-white mb-4">
                        Nikmati layanan laundry berkualitas dengan sistem antar-jemput. 
                        Praktis, bersih, dan wangi untuk pakaian Anda.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#pesan" class="btn btn-light btn-lg px-4">
                            <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                        </a>
                        <a href="layanan.php" class="btn btn-outline-light btn-lg px-4">
                            <i class="fas fa-info-circle me-2"></i>Lihat Layanan
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="assets/images/logo.png" alt="Laundry Service" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-5 fw-bold">Mengapa Memilih FreshLaundry?</h2>
                    <p class="lead text-muted">Kami memberikan layanan terbaik untuk kepuasan Anda</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-truck fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title">Antar Jemput</h5>
                            <p class="card-text">Layanan antar-jemput gratis untuk area tertentu. Tidak perlu repot keluar rumah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-clock fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title">24/7 Service</h5>
                            <p class="card-text">Pesan kapan saja, kami siap melayani Anda 24 jam sehari, 7 hari seminggu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-star fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title">Kualitas Terjamin</h5>
                            <p class="card-text">Menggunakan detergen berkualitas dan proses yang higienis untuk hasil terbaik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pesan" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-primary text-white text-center py-3">
                            <h3 class="mb-0">
                                <i class="fas fa-edit me-2"></i>Form Pemesanan Laundry
                            </h3>
                        </div>
                        <div class="card-body p-4">
                            <form action="proses_pesanan.php" method="POST" id="formPesanan">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap *</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="telepon" class="form-label">Nomor Telepon *</label>
                                        <input type="tel" class="form-control" id="telepon" name="telepon" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Lengkap *</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="jenis_layanan" class="form-label">Jenis Layanan *</label>
                                        <select class="form-select" id="jenis_layanan" name="jenis_layanan" required>
                                            <option value="">Pilih Layanan</option>
                                            <option value="cuci_kering">Cuci Kering</option>
                                            <option value="cuci_setrika">Cuci + Setrika</option>
                                            <option value="setrika_saja">Setrika Saja</option>
                                            <option value="dry_clean">Dry Clean</option>
                                            <option value="premium">Premium Care</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="berat" class="form-label">Berat (kg) *</label>
                                        <input type="number" class="form-control" id="berat" name="berat" min="1" step="0.5" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="jadwal_jemput" class="form-label">Jadwal Penjemputan *</label>
                                        <input type="datetime-local" class="form-control" id="jadwal_jemput" name="jadwal_jemput" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="catatan" class="form-label">Catatan Tambahan</label>
                                        <textarea class="form-control" id="catatan" name="catatan" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>Kirim Pesanan
                                    </button>
                                </div>
                            </form>
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
    <script src="assets/js/script.js"></script>
</body>
</html> 