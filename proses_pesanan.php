<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama']);
    $telepon = trim($_POST['telepon']);
    $alamat = trim($_POST['alamat']);
    $jenis_layanan = $_POST['jenis_layanan'];
    $berat = floatval($_POST['berat']);
    $jadwal_jemput = $_POST['jadwal_jemput'];
    $catatan = trim($_POST['catatan'] ?? '');

    $harga_per_kg = [
        'cuci_kering' => 8000,
        'cuci_setrika' => 12000,
        'setrika_saja' => 6000,
        'dry_clean' => 15000,
        'premium' => 20000
    ];

    $total_harga = $harga_per_kg[$jenis_layanan] * $berat;
    $nomor_pesanan = 'FL' . date('Ymd') . rand(1000, 9999);
    $status = 'pending';
    $tanggal_pesanan = date('Y-m-d H:i:s');
    $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;

    try {
        $stmt = $pdo->prepare("
            INSERT INTO pesanan (
                nomor_pesanan, nama, telepon, alamat, jenis_layanan, 
                berat, total_harga, jadwal_jemput, catatan, status, tanggal_pesanan, user_id
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $nomor_pesanan, $nama, $telepon, $alamat, $jenis_layanan,
            $berat, $total_harga, $jadwal_jemput, $catatan, $status, $tanggal_pesanan, $user_id
        ]);

        $_SESSION['pesanan_sukses'] = [
            'nomor_pesanan' => $nomor_pesanan,
            'nama' => $nama,
            'jenis_layanan' => $jenis_layanan,
            'berat' => $berat,
            'total_harga' => $total_harga,
            'jadwal_jemput' => $jadwal_jemput
        ];

        header('Location: sukses_pesanan.php');
        exit();

    } catch (PDOException $e) {
        $_SESSION['error'] = 'Terjadi kesalahan saat menyimpan pesanan. Silakan coba lagi.';
        header('Location: index.php#pesan');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?> 