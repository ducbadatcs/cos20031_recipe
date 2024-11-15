<?php
include 'dbConnection.php';

$tableList = array();
$sqlTableList = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = ?";
$conn = new mysqli($servername, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("<i class='fa fa-exclamation-triangle' aria-hidden='true'>Database connection error: " . $conn->connect_error . "</i><br>");
}

if ($stmt = $conn->prepare($sqlTableList)) {
    $stmt->bind_param("s", $database);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $tableList[] = $row['TABLE_NAME'];
    }
    $stmt->close();
} else {
    die("Error preparing statement: " . $conn->error);
}

// Function to create and initialize tables
function createTable($conn, $sql, $insertSqls) {
    if ($conn->query($sql) === TRUE) {
        foreach ($insertSqls as $insertSql) {
            if ($conn->query($insertSql) !== TRUE) {
                echo "Error inserting data: " . $conn->error;
            }
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Create user table and initialize data if user table does not exist in database
if (!in_array('user', $tableList)) {
    $sqlTable = "CREATE TABLE IF NOT EXISTS user (
        ID INT(10) AUTO_INCREMENT PRIMARY KEY,
        userName VARCHAR(30) NOT NULL UNIQUE,
        phone VARCHAR(20) NOT NULL UNIQUE,
        email VARCHAR(30) NOT NULL UNIQUE,
        Password VARCHAR(30) NOT NULL
    )";

    $insertSqls = [
        "INSERT INTO user (userName, email, phone, Password) VALUES ('cos20031a', 'cos30049a@swinburn.edu.vn', '123456789', '12345678')",
        "INSERT INTO user (userName, email, phone, Password) VALUES ('cos20031b', 'cos30049b@swinburn.edu.vn', '987654321', '12345678')"
    ];

    createTable($conn, $sqlTable, $insertSqls);
}

$conn->close();
?>
