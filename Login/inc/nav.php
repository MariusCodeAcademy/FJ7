<nav>
    <a href="index.php" class="nav-link checked ">Home</a>
    <a href="about.php" class="nav-link">About</a>
    <!-- // paslepti login nuoroda jei mes prisijunge -->
    <?php printLoginOrLogout(); ?>
    <?php if (ifUserIsLoggedIn()) { ?>
        <span style='float: right'>logged in : <?php echo $_SESSION['username'] ?></span>
    <?php } ?>
</nav>