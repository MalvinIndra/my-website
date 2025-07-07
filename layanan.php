<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - FreshLaundry</title>
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
                        <a class="nav-link active" href="layanan.php">Layanan</a>
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

    <section class="py-5" style="margin-top: 80px;">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h1 class="display-4 fw-bold">Layanan Kami</h1>
                    <p class="lead text-muted">Berbagai pilihan layanan laundry berkualitas untuk memenuhi kebutuhan Anda</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="text-center mb-4">
                            <i class="fas fa-wind fa-3x text-primary mb-3"></i>
                            <h4>Cuci Kering</h4>
                            <div class="price-tag mb-3">Rp 8.000/kg</div>
                        </div>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Cuci dengan mesin modern</li>
                            <li><i class="fas fa-check text-success me-2"></i>Detergen berkualitas</li>
                            <li><i class="fas fa-check text-success me-2"></i>Proses 1-2 hari</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pakaian bersih dan wangi</li>
                            <li><i class="fas fa-check text-success me-2"></i>Antar-jemput gratis</li>
                        </ul>
                        <div class="text-center mt-4">
                            <a href="index.php#pesan" class="btn btn-primary">
                                <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="text-center mb-4">
                            <i class="fas fa-iron fa-3x text-primary mb-3"></i>
                            <h4>Cuci + Setrika</h4>
                            <div class="price-tag mb-3">Rp 12.000/kg</div>
                        </div>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Cuci dengan mesin modern</li>
                            <li><i class="fas fa-check text-success me-2"></i>Setrika profesional</li>
                            <li><i class="fas fa-check text-success me-2"></i>Proses 2-3 hari</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pakaian rapi dan licin</li>
                            <li><i class="fas fa-check text-success me-2"></i>Antar-jemput gratis</li>
                        </ul>
                        <div class="text-center mt-4">
                            <a href="index.php#pesan" class="btn btn-primary">
                                <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="text-center mb-4">
                            <i class="fas fa-fire fa-3x text-primary mb-3"></i>
                            <h4>Setrika Saja</h4>
                            <div class="price-tag mb-3">Rp 6.000/kg</div>
                        </div>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Setrika profesional</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pakaian rapi dan licin</li>
                            <li><i class="fas fa-check text-success me-2"></i>Proses 1 hari</li>
                            <li><i class="fas fa-check text-success me-2"></i>Kualitas terjamin</li>
                            <li><i class="fas fa-check text-success me-2"></i>Antar-jemput gratis</li>
                        </ul>
                        <div class="text-center mt-4">
                            <a href="index.php#pesan" class="btn btn-primary">
                                <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="text-center mb-4">
                            <i class="fas fa-spray-can fa-3x text-primary mb-3"></i>
                            <h4>Dry Clean</h4>
                            <div class="price-tag mb-3">Rp 15.000/kg</div>
                        </div>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Cuci kering khusus</li>
                            <li><i class="fas fa-check text-success me-2"></i>Untuk pakaian premium</li>
                            <li><i class="fas fa-check text-success me-2"></i>Proses 3-4 hari</li>
                            <li><i class="fas fa-check text-success me-2"></i>Tanpa air dan deterjen</li>
                            <li><i class="fas fa-check text-success me-2"></i>Antar-jemput gratis</li>
                        </ul>
                        <div class="text-center mt-4">
                            <a href="index.php#pesan" class="btn btn-primary">
                                <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="text-center mb-4">
                            <i class="fas fa-crown fa-3x text-primary mb-3"></i>
                            <h4>Premium Care</h4>
                            <div class="price-tag mb-3">Rp 20.000/kg</div>
                        </div>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Layanan premium lengkap</li>
                            <li><i class="fas fa-check text-success me-2"></i>Detergen premium</li>
                            <li><i class="fas fa-check text-success me-2"></i>Proses 2-3 hari</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pewangi premium</li>
                            <li><i class="fas fa-check text-success me-2"></i>Antar-jemput gratis</li>
                        </ul>
                        <div class="text-center mt-4">
                            <a href="index.php#pesan" class="btn btn-primary">
                                <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="text-center mb-4">
                            <i class="fas fa-truck fa-3x text-primary mb-3"></i>
                            <h4>Antar Jemput</h4>
                            <div class="price-tag mb-3">GRATIS</div>
                        </div>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Layanan antar-jemput</li>
                            <li><i class="fas fa-check text-success me-2"></i>Area tertentu</li>
                            <li><i class="fas fa-check text-success me-2"></i>Jadwal fleksibel</li>
                            <li><i class="fas fa-check text-success me-2"></i>Tim profesional</li>
                            <li><i class="fas fa-check text-success me-2"></i>Tracking real-time</li>
                        </ul>
                        <div class="text-center mt-4">
                            <a href="kontak.php" class="btn btn-primary">
                                <i class="fas fa-phone me-2"></i>Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-5 fw-bold">Keunggulan Layanan Kami</h2>
                    <p class="lead text-muted">Mengapa memilih layanan laundry kami?</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-3 text-center">
                    <div class="mb-3">
                        <i class="fas fa-clock fa-2x text-primary"></i>
                    </div>
                    <h5>Layanan 24/7</h5>
                    <p class="text-muted">Pesan kapan saja, kami siap melayani</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="mb-3">
                        <i class="fas fa-shield-alt fa-2x text-primary"></i>
                    </div>
                    <h5>Kualitas Terjamin</h5>
                    <p class="text-muted">Menggunakan peralatan dan bahan berkualitas</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="mb-3">
                        <i class="fas fa-leaf fa-2x text-primary"></i>
                    </div>
                    <h5>Ramah Lingkungan</h5>
                    <p class="text-muted">Detergen ramah lingkungan dan biodegradable</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="mb-3">
                        <i class="fas fa-heart fa-2x text-primary"></i>
                    </div>
                    <h5>Pelayanan Ramah</h5>
                    <p class="text-muted">Tim customer service yang profesional</p>
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