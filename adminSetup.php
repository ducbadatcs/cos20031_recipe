<?php
// Kết nối đến MySQL
include 'dbConnection.php';

try {
    // Tạo kết nối, sử dụng các biến từ dbConnection.php
    $conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tạo bảng admin nếu chưa tồn tại
    $sql = "CREATE TABLE IF NOT EXISTS admin (
        ID INT(11) AUTO_INCREMENT PRIMARY KEY,
        AdminName VARCHAR(50) NOT NULL,
        BirthDate DATE NOT NULL,
        Email VARCHAR(100) NOT NULL,
        Password VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);
    echo "Table 'admin' created successfully<br>";

    // Mã hóa mật khẩu
    $hashedPassword = password_hash("Qer1234567@", PASSWORD_DEFAULT);

    // Thêm một bản ghi admin mẫu
    $sql = "INSERT INTO admin (AdminName, BirthDate, Email, Password) VALUES 
            ('Đặng Thái Sơn', '2005-03-16', 'sonthaidang1630@gmail.com', '$hashedPassword')";
    $conn->exec($sql);
    echo "Admin 'Đặng Thái Sơn' added successfully<br>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
