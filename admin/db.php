<?php
// Konfigurasi database
$host = "localhost"; // Host database, biasanya 'localhost'
$user = "root";  
$password = "";    
$dbname = "monitoring_jaringan"; // nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
} else {
    // echo "Koneksi berhasil"; // Opsional, untuk debugging
}
?>