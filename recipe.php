

<?php
include 'dbConnection.php';
include 'loginSetup.php'; // Replaced individual table setups with a single include for login setup
session_start();
$isLoggedIn = isset($_SESSION['userName']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Recipes</title>
    <link rel="stylesheet" href="recipe.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" href="style/sonstyle.css">
    <link rel="stylesheet" href="style/sonstyles.css">
</head>
<body>

    <nav class="topnav">
        <img src="imagemenu/logo.png" alt="Description of the image" class="logo">
        <div class="autocomplete">
          <div id="autocomplete-list" class="autocomplete-items"></div>
        </div>
            <?php if ($isLoggedIn): ?>
                <a  href="product.php" onmouseover="showVerticalMenu()" onmouseout="hideVerticalMenu()">Products</a>
                <a class="active" href="history.php">Transaction history</a>
                <a href="Index.php">Home page</a>
                <a href="decrypt.php">Decrypt</a>
                <a href="wallet.php">Wallet</a>
            <?php else: ?>
                
                <a  href="product.php" onmouseover="showVerticalMenu()" onmouseout="hideVerticalMenu()">Products</a>
                <a href="history.php">Transaction history</a>
                <a href="Index.php">Home page</a>
            <?php endif; ?>
            
        <div class="auth-buttons">
            <?php if ($isLoggedIn): ?>
                <span class="welcome-message">Welcome, <?php echo $_SESSION['userName']; ?>!</span>
                <a href="logout.php" class="logout-btn">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login-btn">Login</a>
                <a href="register.php" class="register-btn">Register</a>
            <?php endif; ?>
        </div>
    </nav>
      
      <script type="text/javascript" src="java/function.js"></script>
      <script type="text/javascript" src="java/script.js"></script>
    <h1>Browse Recipes</h1>
    <div class="filters">
        
        <label for="search">Search</label>
        <input type="text" id="search" placeholder="Search...">

        <label for="sort">Sort By</label>
        <select id="sort">
            <option value="calories">Calories</option>
            <option value="carbs">Carbs</option>
            <option value="fat">Fat</option>
            <option value="protein">Protein</option>
        </select>
        <button id="toggleSortOrder">Toggle Sort Order</button>

    </div>
    <table>
        <thead>
            <tr>
                <th>Recipe</th>
                <th>Calories</th>
                <th>Carbs</th>
                <th>Fat</th>
                <th>Protein</th>
            </tr>
        </thead>
        <tbody class="recipelist">
            <!-- Recipe rows will go here -->
        </tbody>
    </table>

    <script src="recipe.js"></script>
</body>
</html>
