<?php
include 'dbConnection.php';
session_start();

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["admin_username"];
    $password = $_POST["admin_password"];
    
    $sql = "SELECT Password, Email FROM admin WHERE AdminName = ?";
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $record = $result->fetch_assoc();
            if (password_verify($password, $record['Password'])) {
                $_SESSION['userName'] = $username;
                $_SESSION['userEmail'] = $record['Email'];
                header('Location: recipe.php');
                exit();
            } else {
                $message = 'Incorrect password';
            }
        } else {
            $message = 'Admin username not found';
        }
        $stmt->close();
    } else {
        $message = 'Database error';
    }
    $conn->close();
}

if (!empty($message)) {
    echo "<script>alert('$message'); window.location.href='login.php';</script>";
}
?>
