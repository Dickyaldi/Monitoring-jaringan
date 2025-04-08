<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: ../admin/index.php"); // Ganti ke halaman dashboard kamu
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1d3557, #457b9d);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #1d3557;
            font-weight: bold;
        }
        button {
            background-color: #1d3557;
            border: none;
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

<div class="login-container">
    <h3>Login Admin</h3>
    <form action="proses_login.php" method="POST">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>

</body>
</html>
