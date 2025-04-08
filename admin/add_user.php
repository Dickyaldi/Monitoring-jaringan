<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = trim($_POST['nama']);
    $email    = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level    = $_POST['level'];

    // Cek username atau email sudah ada atau belum
    $cek = $conn->prepare("SELECT * FROM admin WHERE username = ? OR email = ?");
    $cek->bind_param("ss", $username, $email);
    $cek->execute();
    $result = $cek->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username atau Email sudah digunakan!'); window.location.href='add_user.php';</script>";
    } else {
        // Insert User Baru
        $sql = "INSERT INTO admin (nama, email, username, password, level) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nama, $email, $username, $password, $level);

        if ($stmt->execute()) {
            echo "<script>alert('User berhasil ditambahkan!'); window.location.href='index.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
    }

    $cek->close();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    body {
        background: linear-gradient(135deg, #1d3557, #457b9d);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .container {
        max-width: 500px;
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin-top: 80px;
        transition: 0.3s;
    }
    .container:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #1d3557;
        font-weight: bold;
    }
    label {
        font-weight: 600;
        color: #1d3557;
    }
    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 10px;
        transition: 0.3s;
    }
    .form-control:focus, .form-select:focus {
        border-color: #457b9d;
        box-shadow: 0 0 5px rgba(69, 123, 157, 0.5);
    }
    button {
        background-color: #1d3557;
        border: none;
        padding: 10px;
        border-radius: 8px;
        font-weight: bold;
        transition: 0.3s;
    }
    button:hover {
        background-color: #457b9d;
        transform: scale(1.03);
    }
</style>

</head>
<body>
    <div class="container">
        <h2>Tambah User</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Level</label>
                <select name="level" class="form-select" required>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Tambah User</button>
        </form>
    </div>
</body>
</html>