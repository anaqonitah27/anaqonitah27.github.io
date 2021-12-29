<?php
include "koneksi.php";
session_start();
$Username = $_POST['Username'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];

if (empty($Username) ||
    empty($password) ||
    empty($ket)) {
    $_SESSION['messages'][] = 'Data tidak boleh kosong!';
    header('Location: register.php');
    exit();
}
$cekdulu = "SELECT * FROM admin WHERE username = '$Username'";
$prosescek =  mysqli_query($connect, $cekdulu);
if (mysqli_num_rows($prosescek)>0) { 
    echo "<script>alert('Username Sudah Digunakan, gunakan username baru!');history.go(-1) </script>";
}
else {
    $query = "INSERT INTO admin (username,password,nama_lengkap) VALUES ('$Username','$password','$nama_lengkap')";
    $result=mysqli_query($connect,$query);
    if ($result) {
        $_SESSION['messages'][] = 'Terima Kasih Telah mendaftar, silahkan <a href="login.php">Login</a>';
        header('Location: register.php');
        exit;
    } 
    else {
        $_SESSION['messages'][] = 'Sign Up gagal';
        header('Location: register.php');
        exit;
    }
}


