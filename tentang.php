<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - FreshLaundry</title>
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
                        <a class="nav-link active" href="tentang.php">Tentang Kami</a>
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

    <section class="py-5" style="margin-top: 80px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold mb-4">Tentang FreshLaundry</h1>
                    <p class="lead mb-4">FreshLaundry hadir untuk memberikan solusi laundry modern, praktis, dan terpercaya bagi mahasiswa, pekerja sibuk, dan masyarakat umum. Kami mengutamakan kualitas, kecepatan, dan kemudahan layanan dengan sistem antar-jemput serta pemesanan online 24/7.</p>
                    <div class="row mt-5">
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 shadow h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-bullseye text-primary me-2"></i>Visi</h5>
                                    <p class="card-text">Menjadi layanan laundry online terbaik dan terpercaya di Indonesia dengan mengedepankan kepuasan pelanggan dan inovasi layanan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 shadow h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-lightbulb text-primary me-2"></i>Misi</h5>
                                    <ul class="mb-0">
                                        <li>Menyediakan layanan laundry berkualitas dengan harga terjangkau</li>
                                        <li>Memberikan kemudahan pemesanan dan pembayaran online</li>
                                        <li>Mendukung gaya hidup praktis dan efisien</li>
                                        <li>Menjaga kepercayaan dan kepuasan pelanggan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h4 class="fw-bold mb-3">Mengapa Memilih Kami?</h4>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check-circle text-success me-2"></i>Proses cepat dan higienis</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Antar-jemput gratis</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Customer service ramah</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Garansi kepuasan</li>
                        </ul>
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