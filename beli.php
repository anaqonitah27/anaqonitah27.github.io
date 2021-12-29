<?php
session_start();
$id_produk = $_GET['id'];

//menambah jumlah produk di keranjang
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
}
// kalo belom ada berarti jumlah itemnya 1
else {
    $_SESSION['keranjang'][$id_produk] = 1;
}
echo "<script>alert('Produk Telah Ditambahkan ke Keranjang');</script>";
echo "<script>location='keranjang.php'</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Beli</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
    <!-- NAVBAR -->
    <header><a href="#" class="logo"><img src="logo.svg" class="logo"></a>
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">KERANJANG</a></li>
            <li><a href="#">LOGIN</a></li>
            <li><a href="#">CHECKOUT</a></li>
        </ul>
    </header>
    <!-- CONTENT -->
    <section>
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <table>
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>SubHarga</th>
                    </tr>
                </thead>
                <tbody>
                <?php $nomor = 1; ?>
                <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                <?php 
                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah['harga_produk'] = $jumlah;
                ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $pecah['nama_produk']; ?></td>
                    <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                    <td><?php echo $jumlah; ?> </td>
                    <td>Rp. <?php echo $subharga; ?></td>
                </tr>
                <?php $nomor++?>
                <?php endforeach ?>
                </tbody>
            </table>
            <a href="homeCust.php">Lanjut Belanja</a>
            <a href="checkout.php">Checkout</a>
        </div>
    </section>

</body>

</html>