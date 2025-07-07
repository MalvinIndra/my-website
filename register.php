<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $telepon = trim($_POST['telepon']);
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi_password'];
    $error = '';

    if ($password !== $konfirmasi) {
        $error = 'Password dan konfirmasi password tidak sama!';
    } else {
        $stmt = $pdo->prepare('SELECT id FROM user WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = 'Email sudah terdaftar!';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $role = 'user';
            $stmt = $pdo->prepare('INSERT INTO user (nama, email, telepon, password, role) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$nama, $email, $telepon, $hash, $role]);
            $_SESSION['success'] = 'Registrasi berhasil, silakan login!';
            header('Location: login.php');
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FreshLaundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-user-plus me-2"></i>Daftar Akun</h3>
                </div>
                <div class="card-body p-4">
                    <?php if (!empty($error)) { ?>
                        <div class="alert alert-danger text-center mb-3"><?php echo $error; ?></div>
                    <?php } ?>
                    <form action="register.php" method="POST" id="formRegister">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap *</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon *</label>
                            <input type="tel" class="form-control" id="telepon" name="telepon" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="konfirmasi_password" class="form-label">Konfirmasi Password *</label>
                            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" required>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-user-plus me-2"></i>Daftar
                            </button>
                        </div>
                        <div class="text-center">
                            <span>Sudah punya akun? <a href="login.php">Login</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
    document.getElementById('formRegister').addEventListener('submit', function(e) {
        var pass = document.getElementById('password').value;
        var konfirmasi = document.getElementById('konfirmasi_password').value;
        if(pass !== konfirmasi) {
            e.preventDefault();
            alert('Password dan konfirmasi password tidak sama!');
        }
    });
    </script>
</body>
</html> 