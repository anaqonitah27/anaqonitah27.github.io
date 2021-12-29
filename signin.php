<?php
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$query="SELECT * FROM admin WHERE username='$username' and password='$password'";
$result=mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($result);
if ($result) {
        echo "<script>alert('Anda Berhasil LogIn');</script>";
        echo "<script>location='index.php';</script>";
} else {
    echo "Username atau password anda salah, silahkan " ;?>
        <a href="login.php">Login Kembali</a>
        <?php
        echo mysqli_error($connect);
}