<?php
session_start();
session_unset(); // Menghapus semua session
session_destroy(); // Menghancurkan session

echo "<script>
    alert('Anda berhasil logout!');
    window.location.href='../user/login.php';
</script>";
?>
