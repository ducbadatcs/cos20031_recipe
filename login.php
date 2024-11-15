<?php
include 'dbConnection.php';
include 'loginSetup.php';
session_start();
$isLoggedIn = isset($_SESSION['userName']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Online Shopping</title>
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" href="style/sonstyle.css">
    <link rel="stylesheet" href="style/sonstyles.css">
    <link rel="stylesheet" href="style/styleLogin.css">
    <link rel="stylesheet" href="style/accountSelection.css">
</head>
<body onload="showAccountSelection()">

<!-- Pop-up chọn loại tài khoản -->
<div id="account-selection-popup" class="popup">
    <div class="popup-content">
        <p>Your are:</p>
        <button onclick="selectUserLogin()">User</button>
        <button onclick="selectAdminLogin()">Admin</button>
    </div>
</div>

<!-- Giao diện đăng nhập người dùng -->
<div id="user-login" class="login-section">
    <h2>User Login</h2>
    <!-- Giao diện đăng nhập người dùng ở đây -->
    <form method="post" action="userLoginProcess.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="login-button">Login</button>
    </form>
</div>

<!-- Giao diện đăng nhập admin -->
<div id="admin-login" class="login-section">
    <h2>Admin Login</h2>
    <form method="post" action="adminLoginProcess.php">
        <div class="form-group">
            <label for="admin-username">Username:</label>
            <input type="text" id="admin-username" name="admin_username" required>
        </div>
        <div class="form-group">
            <label for="admin-password">Password:</label>
            <input type="password" id="admin-password" name="admin_password" required>
        </div>
        <button type="submit" class="login-button">Login as Admin</button>
    </form>
</div>

<script src="js/accountSelection.js"></script>
</body>
</html>
