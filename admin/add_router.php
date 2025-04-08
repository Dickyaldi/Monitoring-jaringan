<?php
include 'db.php';

// Proses tambah router
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lokasi = $_POST['lokasi'];
    $nama_router = $_POST['nama_router'];
    $tanggal = $_POST['tanggal'];
    $jitter = $_POST['jitter'];
    $ip = $_POST['ip'];
    $keterangan = $_POST['keterangan'];
    
    $sql = "INSERT INTO router (lokasi, nama_router, tanggal, jitter, ip, keterangan) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $lokasi, $nama_router, $tanggal, $jitter, $ip, $keterangan);
    
    if ($stmt->execute()) {
        echo "<script>alert('Router berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Router</title>
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
        <div class="card">
            <h2 class="text-center">Tambah Router</h2>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Router</label>
                    <input type="text" name="nama_router" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jitter</label>
                    <input type="text" name="jitter" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">IP Address</label>
                    <input type="text" name="ip" class="form-control" required>
                </div>
                <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <select name="keterangan" class="form-select" required>
                    <option value="enabel">Enabel</option>
                    <option value="disabel">Disabel</option>
                </select>
            </div>
                <button type="submit" class="btn btn-primary">Tambah Router</button>
            </form>
        </div>
    </div>
</body>
</html>