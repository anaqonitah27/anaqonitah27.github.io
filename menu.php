<html>
    
    <body>
        <!---Navbar-->
<nav class="navbar navbar-expand-sm fixed-top bg-secondary">
        <a class="navbar-brand" href="homeCust.php">
            <img src="img/logo.png" alt="logo" style="width:50px;">
        </a>
        <?php if (isset($_SESSION['pelanggan'])): ?>
        <span class="navbar-text">
           HI <?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>!
        </span>
        <?php endif ?>
        <ul class="nav navbar-nav">

            <li class="nav-item "><a class="nav-link" href="homeCust.php">HOME</a></li>
            <li class="nav-item"><a class="nav-link " href="keranjang.php">Keranjang</a></li>
            <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>
                    <!--Jika sudah login ada session pelanggan-->
            <?php if (isset($_SESSION['pelanggan'])): ?>
                <li><a class="nav-link" href="riwayat.php">Riwayat</a></li>
                <li><a href="logoutCust.php" onclick="return confirm('Apakah Anda Yakin Ingin Logout?')">Logout</a></li>
            <!--Jika belum login tidak ada session pelanggan-->
                <?php else: ?>
                    <li class="nav-item"><a href="login.php">Login</a></li>
                    <span class="navbar-text">
                        Belum punya akun?
                    </span>
                    <li class="nav-item"><a href="registerCust.php">Daftar Sekarang!</a></li>
                <?php endif ?>
        </ul>
</nav>

    </body>
</html>


