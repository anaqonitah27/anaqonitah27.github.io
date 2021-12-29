<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])){
    echo"<script> alert('Silahkan Login Terlebih Dahulu!');</script>";
    echo"<script> location='loginCust.php';</script>";
}
$idpen = $_GET["id"];
$ambil = $connect->query("SELECT * FROM pembelian WHERE id_pembelian ='$idpen'");
$detpen = $ambil->fetch_assoc();

$id_pel_beli = $detpen["id_pelanggan"];

$id_pel_login = $_SESSION["pelanggan"]["id_pelanggan"];
if($id_pel_login !== $id_pel_beli){
    echo "<script> alert('Anda belum checkout pesanan anda, Silahkan pilih ongkir dan lakukan checkout terlebih dahulu!');</script>";
    echo "<script> location='checkout.php';</script>";
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran</title>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
    <?php include 'menu.php'; ?>
    <div class ="container">
        <h1>Konfirmasi Pembayaran</h1>
        <p>Kirim Bukti Pembayaran Anda disini!</p>
        <div class="alert alert-info">Total Tagihan Anda <strong> Rp. <?php echo number_format($detpen["total_pembelian"]);?></strong></div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama penyetor</label>
                <input type="text" class="form-control" name="nama" readonly value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"]?>">
            </div>
            <label for="exampleDataList" class="form-label">Metode Pembayaran</label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
            <datalist id="datalistOptions">
                <option value="BRI">
                <option value="Mandiri">
                <option value="BCA">
                <option value="Link Aja">
                <option value="OVO">
            </datalist>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" name="jumlah" readonly value="Rp. <?php echo number_format($detpen["total_pembelian"]);?>">
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label">Foto Bukti</label>
                <input class="form-control" type="file" id="formFile" name="bukti" required>
                <p class="text text-danger"> Foto Bukti Harus JPG Maksimal 2 MB </p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>

    <?php
    if(isset($_POST['kirim'])){
        $namabukti = $_FILES["bukti"]["name"];
        $lokasibukti = $_FILES["bukti"]["tmp_name"];
        $namafix = date("YmdHis").$namabukti;
        move_uploaded_file($lokasibukti, "foto_produk/$namafix");

        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");
        $id_pem = $_GET['id'];

        $connect -> query("INSERT INTO pembayaran(id_pembelian, nama,bank, jumlah, tanggal, bukti) VALUES 
        ('$id_pem','$nama','$bank','$jumlah','$tanggal','$namafix')");
        $connect -> query("UPDATE pembelian SET status_pembelian='Sudah Dibayar' WHERE id_pembelian='$id_pem'");

        echo "<script> alert ('Terimakasih sudah mengirim bukti pembayaran')</script>";
        echo "<script> location='riwayat.php';</script>";
    }
    ?>
</body>
</html>