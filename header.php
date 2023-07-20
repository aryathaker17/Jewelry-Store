<nav>
    <?php session_start(); ?>  
    <ul>
        <?php if(isset($_SESSION['is_valid']) && $_SESSION['is_valid'] == true && isset($_SESSION['email'])) {
            echo "Welcome, " . $_SESSION['email'];
        } ?>
        <li><a href="home.php">Home</a></li>
        <?php if (isset($_SESSION['is_valid'])) { ?>
            <li><a href="create.php">Create</a></li>
        <?php } ?>
        <li><a href="jewl.php">Jewelry</a></li>
        <?php if (isset($_SESSION['is_valid'])) { ?>
            <li><a href="shipping.php">Shipping</a></li>
        <?php } ?>

        <?php if (isset($_SESSION['is_valid'])) { ?>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        <?php } else { ?>
            <li>
                <a href="login.php">Login</a>
            </li>
        <?php } ?>
    </ul>
</nav>