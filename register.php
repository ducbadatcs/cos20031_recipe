<?php 
include 'dbConnection.php'; 
session_start();
$isLoggedIn = isset($_SESSION['userName']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Online Shopping</title>
    <link rel="stylesheet" href="style/styleRes.css">
    <link rel="stylesheet" href="style/shoppingcartstyle.css">
    <link rel="stylesheet" href="style/sonstyle.css">
    <link rel="stylesheet" href="style/sonstyles.css">
    <link rel="stylesheet" href="style/stylekiet2.css">

</head>
<body>
<nav class="topnav">
        <img src="imagemenu/logo.png" alt="Description of the image" class="logo">
        <div class="autocomplete">
          <div id="autocomplete-list" class="autocomplete-items"></div>
        </div>
            <?php if ($isLoggedIn): ?>
                <a  href="product.php" onmouseover="showVerticalMenu()" onmouseout="hideVerticalMenu()">Products</a>
                <a href="history.php">Transaction history</a>
                <a href="Index.php">Home page</a>
                <a href="decrypt.php">Decrypt</a>
            <?php else: ?>
                
                <a href="product.php" onmouseover="showVerticalMenu()" onmouseout="hideVerticalMenu()">Products</a>
                <a href="history.php">Transaction history</a>
                <a href="Index.php">Home page</a>
            <?php endif; ?>
            
        <div class="auth-buttons">
            <?php if ($isLoggedIn): ?>
                <span class="welcome-message">Welcome, <?php echo $_SESSION['userName']; ?>!</span>
                <a href="logout.php" class="logout-btn">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login-btn">Login</a>
                <a class="active" href="register.php" class="register-btn">Register</a>
            <?php endif; ?>
        </div>
      </nav>
      
      <script type="text/javascript" src="java/function.js"></script>
      <script type="text/javascript" src="java/script.js"></script>
    <div class="main-content">
    <div class="login-container">
        <h2>Register for Your Account</h2>
        <?php
            $message = '';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['register'])){
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $password = $_POST["password"];
                    $confirmPassword = $_POST["confirm_password"];
                    if ($password !== $confirmPassword) {
                        $message = "Passwords do not match.";
                    } else {
                        // Insert data into user table
                        try {
                            $conn = new mysqli($servername, $db_username, $db_password, $database);

                            //check if username exist
                            $usernameSql = "SELECT userName FROM user WHERE userName = '$username'";
                            if ($result = mysqli_query($conn,$usernameSql)){
                                if (mysqli_num_rows($result)>0){
                                    $message = 'Username has been existed';
                                    mysqli_close($conn);
                                }   
                                else
                                {
                                    $sql = "INSERT INTO user (userName, email, phone, Password) VALUES ('$username', '$email','$phone', '$password')";
                                    mysqli_query($conn, $sql);
                                    mysqli_close($conn);
                                    $message = "Registration successful. You can now log in.";
                                }                            
                            }                           
                        } catch (Exception $e) {
                            $message = "Error: " . $e->getMessage();
                        }
                    }
                }
                if (isset($_POST['signin'])){
                    header('location:login.php');
                }
            }
        ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password">
            </div>
            <p><button type="submit" class="login-button" name="register">Register</button></p>
            <p><button type="submit" class="login-button" name="signin">Sign In</button></P>
        </form>
        <?php
            if (!empty($message)) {
                echo "<script src='message.js'></script><script>showError('$message');</script>";
            }
        ?>
    </div>
    <div>
    <script src="message.js"></script>
    </div>
        </div>
</body>
</html>
