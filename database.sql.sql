-- Database: freshlaundry
-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS freshlaundry;
USE freshlaundry;

-- Tabel user untuk login/register
CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  telepon VARCHAR(20) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(20) NOT NULL DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel pesanan laundry
CREATE TABLE pesanan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nomor_pesanan VARCHAR(32) NOT NULL,
  nama VARCHAR(100) NOT NULL,
  telepon VARCHAR(20) NOT NULL,
  alamat TEXT NOT NULL,
  jenis_layanan VARCHAR(32) NOT NULL,
  berat DECIMAL(5,2) NOT NULL,
  total_harga INT NOT NULL,
  jadwal_jemput DATETIME NOT NULL,
  catatan TEXT,
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  tanggal_pesanan DATETIME NOT NULL,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE SET NULL
);

-- Tabel pesan kontak
CREATE TABLE pesan_kontak (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  pesan TEXT NOT NULL,
  tanggal_kirim TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status VARCHAR(20) DEFAULT 'unread'
);

-- Insert data admin default
INSERT INTO user (nama, email, telepon, password, role) VALUES 
('Admin FreshLaundry', 'admin@freshlaundry.com', '081234567890', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Insert data pesanan contoh
INSERT INTO pesanan (nomor_pesanan, nama, telepon, alamat, jenis_layanan, berat, total_harga, jadwal_jemput, catatan, status, tanggal_pesanan) VALUES 
('FL20241201001', 'John Doe', '081234567890', 'Jl. Contoh No. 123, Jakarta', 'cuci_setrika', 2.5, 30000, '2024-12-02 10:00:00', 'Pakaian kerja', 'pending', '2024-12-01 15:30:00'),
('FL20241201002', 'Jane Smith', '081234567891', 'Jl. Sample No. 456, Bandung', 'cuci_kering', 1.5, 12000, '2024-12-02 14:00:00', 'Pakaian casual', 'processing', '2024-12-01 16:45:00'),
('FL20241201003', 'Bob Johnson', '081234567892', 'Jl. Test No. 789, Surabaya', 'dry_clean', 3.0, 45000, '2024-12-03 09:00:00', 'Pakaian formal', 'completed', '2024-12-01 18:20:00');

-- Insert data pesan kontak contoh
INSERT INTO pesan_kontak (nama, email, pesan) VALUES 
('Alice Brown', 'alice@email.com', 'Apakah ada layanan antar-jemput untuk area Depok?'),
('Charlie Wilson', 'charlie@email.com', 'Berapa lama proses cuci premium?'),
('Diana Davis', 'diana@email.com', 'Apakah bisa pesan untuk besok pagi?'); 