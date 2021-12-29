<?php
session_start();
$koneksi = new mysqli("localhost","root", "", "cafe_astory"); 
?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Form Login</title>
</head>

<body>
    <div class="wrap">
        <div class="content">
            <div class="logo">
                <img src="img/logo.png" alt="logo" width="200px">
                <h2>LOGIN PELANGGAN</h2>
            </div>
        <form id="login" class="input-group" method="post"><br><br>
                Username: <input type="text" name="Username" class="input-field" placeholder="Isi Username">
                Password: <input type="password" name="password" class="input-field" placeholder="Isi Password" id="inputPassword" required>
                <input type="checkbox" class="cb" id="show-password"> <span>Tampilkan password</span>
                    <button type="submit" class="submit-btn" name="login">Login</button>
        </form>
            <?php 
            if (isset($_POST['login'])) {
                $username = $_POST['Username'];
                $password = $_POST['password'];

                $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE nama_pelanggan = '$username' AND password_pelanggan = '$password'");
                $cocok = $ambil->num_rows;
                if ($cocok == 1) {
                    $akun = $ambil->fetch_assoc();
                    
                    $_SESSION['pelanggan'] = $akun;
                    echo "<script>alert('Anda Berhasil LogIn');</script>";
                    echo "<meta http-equiv='refresh' content='1; url=homeCust.php'>";
               } else {     
                    echo "<div class='alert alert danger text-center'>Login Gagal, Silahkan Periksa Akun Anda</div>";
                    echo "<meta http-equiv='refresh' content='1; url=loginCust.php'>";
                }
            }
            ?><br>
            <p>Don't have an account? <a href="registerCust.php">Sign up now</a>.</p>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(document).ready(function () {
        $('#show-password').click(function () {
            if ($(this).is(':checked')) {
                $('#inputPassword').attr('type', 'text');
            } else {
                $('#inputPassword').attr('type', 'password');
            }
        });
    });
</script>

</html>