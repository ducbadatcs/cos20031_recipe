<?php
include 'dbConnection.php';
session_start();

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT Password, email FROM user WHERE userName = ?";
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $record = $result->fetch_assoc();
            if ($record['Password'] === $password) {
                $_SESSION['userName'] = $username;
                $_SESSION['userEmail'] = $record['email'];
                header('Location: recipe.php');
                exit();
            } else {
                $message = 'Incorrect password';
            }
        } else {
            $message = 'Username not found';
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
