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
