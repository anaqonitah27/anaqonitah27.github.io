<?php
session_start();
$koneksi = new mysqli("localhost" , "root" , "" , "cafe_astory");
if (!isset($_SESSION['pelanggan'])){
    echo"<script> alert('Silahkan Login Terlebih Dahulu!');</script>";
    echo"<script> location='loginCust.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CafeA Story | Checkout</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <?php include 'menu.php';?>
    <!-- memastikan session pelanggan
    <pre><?php print_r($_SESSION['pelanggan']) ?></pre> -->
    <section class="konten">
        <div class="container">
            <center><h1>KERANJANG BELANJA</h1><br></center>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Produk</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">SubHarga</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php $nomor=1; ?>
                    <?php $total_belanja = 0; ?>
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
                    </tr>
                    <?php $nomor++; ?>
                    <?php $total_belanja+=$subharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot> 
                    <th class="text-center" colspan="4">Total</th>
                    <th class="text-center">Rp. <?php echo number_format($total_belanja); ?></th>
                </tfoot>
            </table>
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="id_ongkir" class="form-control" required>
                                <option value="">-- Pilih Ongkir</option>
                                <?php
                                $ambil = $koneksi ->query("SELECT*FROM ongkir");
                                while($perongkir = $ambil->fetch_assoc()){
                                ?>
                                <option value="<?php echo $perongkir['id_ongkir']; ?>">
                                    <?php echo $perongkir ['nama_kota']; ?>
                                    Rp. <?php echo number_format($perongkir['tarif']); ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" name="checkout">Checkout</button>
            </form>    
 
            <?php
            if (isset($_POST['checkout'])){
                $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                $id_ongkir = $_POST['id_ongkir'];
                $tanggal_pembelian = date("Y-m-d");

                $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
                $array_ongkir = $ambil->fetch_assoc();
                $tarif = $array_ongkir['tarif'];
                $total_pembelian = $total_belanja + $tarif;

                // Menyimpan data ke tabel pembelian
                $koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian) values ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian')");

                $id_pembelian_barusan = $koneksi ->insert_id;
                foreach($_SESSION['keranjang'] as $id_produk => $jumlah){
                    $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah')");
                }

                // Mengosogkan keranjang belanja
                unset($_SESSION['keranjang']);

                //Tampilan dialihkan ke nota, nota yang pembelian barusan
                echo "<script> alert ('Pembelian Sukses');</script>";
                echo "<script>location='nota1.php?id=$id_pembelian_barusan';</script>";
            }
            ?>
        </div>
        </section><br>
</body>
</html>