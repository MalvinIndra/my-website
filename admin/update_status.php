<?php
session_start();
require_once '../config/database.php';

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pesanan_id = $_POST['pesanan_id'];
    $status = $_POST['status'];
    
    try {
        $stmt = $pdo->prepare("UPDATE pesanan SET status = ? WHERE id = ?");
        $stmt->execute([$status, $pesanan_id]);
        
        $_SESSION['success'] = 'Status pesanan berhasil diupdate!';
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Gagal update status pesanan!';
    }
}

header('Location: pesanan.php');
exit();
?> 