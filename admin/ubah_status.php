<?php
include 'db.php';

$id = $_GET['id'];
$keterangan = $_GET['keterangan'];

// Ubah keterangan Enable ke Disable dan sebaliknya
$keterangan_baru = ($keterangan == 'Enable') ? 'Disable' : 'Enable';

$sql = "UPDATE router SET keterangan='$keterangan_baru' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Status berhasil diubah!');
        window.location.href='log_activity.php';
    </script>";
} else {
    echo "Error: " . $conn->error;
}
?>
