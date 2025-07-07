<?php
session_start();
require_once 'config/database.php';

$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $pesan = trim($_POST['pesan']);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO pesan_kontak (nama, email, pesan) VALUES (?, ?, ?)");
        $stmt->execute([$nama, $email, $pesan]);
        $success_message = 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.';
    } catch (PDOException $e) {
        $error_message = 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - FreshLaundry</title>
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
                        <a class="nav-link active" href="kontak.php">Kontak</a>
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
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4 text-center">Kontak Kami</h1>
                    <div class="contact-info mb-5">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <h5><i class="fas fa-map-marker-alt me-2"></i>Alamat</h5>
                                <p>Jl. Contoh No. 123, Kota Anda, Indonesia</p>
                                <h5><i class="fas fa-phone me-2"></i>Telepon</h5>
                                <p>+62 812-3456-7890</p>
                                <h5><i class="fas fa-envelope me-2"></i>Email</h5>
                                <p>info@freshlaundry.com</p>
                            </div>
                            <div class="col-md-6">
                                <h5><i class="fas fa-clock me-2"></i>Jam Operasional</h5>
                                <p>Senin - Minggu: 08.00 - 21.00<br>24/7 untuk pemesanan online</p>
                                <h5><i class="fas fa-globe me-2"></i>Media Sosial</h5>
                                <div class="social-links">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                </div>
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
    <script src="assets/js/script.js"></script>
</body>
</html> 