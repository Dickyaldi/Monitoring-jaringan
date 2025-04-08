<?php
session_start();
include '../admin/db.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$sql = "SELECT * FROM admin WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();

    if (password_verify($password, $data['password'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];

        echo "<script>alert('Login Berhasil!'); window.location.href='../admin/index.php';</script>";
    } else {
        echo "<script>alert('Password Salah!'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location.href='login.php';</script>";
}
$stmt->close();
?>
