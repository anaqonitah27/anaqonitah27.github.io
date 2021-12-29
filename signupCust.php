<?php
include "koneksi.php";
session_start();
$nama_pelanggan = $_POST['nama_pelanggan'];
$password_pelanggan = $_POST['password_pelanggan'];
$telepon_pelanggan = $_POST['telepon_pelanggan'];
$email_pelanggan = $_POST['email_pelanggan'];

if (empty($nama_pelanggan) ||
    empty($password_pelanggan) ||
    empty($telepon_pelanggan) ||
    empty($email_pelanggan)) {
    $_SESSION['messages'][] = 'Data tidak boleh kosong!';
    header('Location: registerCust.php');
    exit();
}

$cekdulu = "SELECT * FROM pelanggan WHERE nama_pelanggan = '$nama_pelanggan'";
$prosescek =  mysqli_query($connect, $cekdulu);
if (mysqli_num_rows($prosescek)>0) { 
    echo "<script>alert('Username Sudah Digunakan, gunakan username baru!');history.go(-1) </script>";
}
else {
    $query = "INSERT INTO pelanggan (nama_pelanggan,password_pelanggan,telepon_pelanggan,email_pelanggan) 
    VALUES ('$nama_pelanggan','$password_pelanggan','$telepon_pelanggan','$email_pelanggan')";
    $result=mysqli_query($connect,$query);
    if ($result) {
        $_SESSION['messages'][] = 'Terima Kasih Telah mendaftar, silahkan <a href="loginCust.php">login</a>';
        header('Location: registerCust.php');
        exit;
    } 
    else {
        $_SESSION['messages'][] = 'Sign Up gagal';
        header('Location: registerCust.php');
        exit;
    }
}


