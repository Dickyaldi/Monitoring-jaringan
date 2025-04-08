<?php
include 'db.php';
$result = $conn->query("SELECT * FROM router ORDER BY tanggal DESC LIMIT 20");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas Jaringan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Log Aktivitas Jaringan</h2>

    <div class="mb-3">
        <a href="index.php" class="btn btn-primary">← Kembali ke Dashboard</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>IP</th>
                    <th>Jitter</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['ip']) ?></td>
                        <td><?= htmlspecialchars($row['jitter']) ?></td>
                        <td><?= htmlspecialchars($row['tanggal']) ?></td>
                        <td><?= htmlspecialchars($row['keterangan']) ?></td>
                        <td>
                            <a href="ubah_status.php?id=<?= $row['id'] ?>&keterangan=<?= $row['keterangan'] ?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda yakin mengubah status keterangan?')">
                                Ubah Status
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>
