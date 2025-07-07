<?php
session_start();
require_once 'config/database.php';

if (isset($_SESSION['user'])) {
    header('Location: welcome.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $error = '';

    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nama' => $user['nama'],
            'email' => $user['email'],
            'role' => $user['role']
        ];
        header('Location: welcome.php');
        exit();
    } else {
        $error = 'Email atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FreshLaundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-sign-in-alt me-2"></i>Login</h3>
                </div>
                <div class="card-body p-4">
                    <?php if (!empty($_SESSION['success'])) { ?>
                        <div class="alert alert-success text-center mb-3"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
                    <?php } ?>
                    <?php if (!empty($error)) { ?>
                        <div class="alert alert-danger text-center mb-3"><?php echo $error; ?></div>
                    <?php } ?>
                    <form action="login.php" method="POST" id="formLogin">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                        </div>
                        <div class="text-center">
                            <span>Belum punya akun? <a href="register.php">Daftar</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html> 