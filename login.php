<?php
session_start();
$koneksi = new mysqli("localhost","root", "", "cafe_astory"); 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="style.css">
    <title>LOGIN ADMIN</title>
</head>
<body>
    <div class="content">
            <div class="logo">
                <img src="img/logo.png" alt="logo" width="200px">
               <h2>LOGIN ADMIN</h2><br>
            </div>
            <form id="login" class="input-group" action="signin.php" method="post"><br>
                Username: <input type="text" name="Username" class="input-field" placeholder="Isi Username">
                Password: <input type="password" name="password" class="input-field" placeholder="Isi Password" id="inputPassword" required>
                <input type="checkbox" class="cb" id="show-password"> <span>Tampilkan password</span>
                    <button type="submit" class="submit-btn"> Login</button>
            </form>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>            
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