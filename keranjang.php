
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <title>CafeA Story | Keranjang</title>
</head>
<body>
    <!-- Navbar -->
    <?php include 'menu.php';
    session_start();
    $koneksi = new mysqli("localhost","root","","cafe_astory");
    // cek session keranjang
    // print_r($_SESSION['keranjang']);
    if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])){
        echo "<script> alert('Produk Kosong. Silahkan Belanja Terlebih Dahulu');</script>";
        echo "<script>location='homeCust.php';</script>";
    }
    ?>
    <!--Content-->
    <section class="konten">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Produk</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">SubHarga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php $nomor=1; ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah['harga_produk'] * $jumlah;
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_produk']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo $subharga; ?></td>
                        <td>
                            <a href="hapus_keranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger" onclick="
                            return confirm('Apakah Anda Yakin Ingin Menghapus Produk Ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="homeCust.php" class="btn btn-default">Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-success">Checkout</a>
        </div>
        </section>
</body>
</html>